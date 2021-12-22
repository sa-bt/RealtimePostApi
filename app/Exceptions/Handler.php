<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;


class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException)
        {
            return $this->errorResponse(422, $e->validator->errors()->messages());
        }

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException)
        {
            DB::rollBack();
            return $this->errorResponse(404, $e->getMessage());
        }

        if ($e instanceof MethodNotAllowedHttpException ||
            $e instanceof RelationNotFoundException ||
            $e instanceof QueryException ||
            $e instanceof Exception ||
            $e instanceof Error)
        {
            DB::rollBack();
            return $this->errorResponse(500, $e->getMessage());
        }


        if (config('app.debug'))
        {
            DB::rollBack();
            return parent::render($request, $e);
        }

        DB::rollBack();
        return $this->errorResponse(500, $e->getMessage());
    }



}
