<?php

namespace App\Traits;
trait ApiResponse
{
    protected function successResponse($data, $code = 200, $message = "عملیات با موفقیت انجام شد")
    {
        return response()->json(
            [
                "status"  => "success",
                "message" => $message,
                "data"    => $data
            ], $code
        );
    }

    protected function errorResponse($code, $message = "در انجام کار مشکلی بوجود آمده است")
    {
        return response()->json(
            [
                "status"  => "error",
                "message" => $message,
            ], $code
        );
    }
}
