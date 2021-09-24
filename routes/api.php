<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/posts',[PostController::class,'index']);
Route::post('/posts',[PostController::class,'store']);
Route::post('/posts/{post}/likes',[LikeController::class,'store']);
Route::get('posts/{post}',[PostController::class,'show']);

Route::get('/tasks/search',[TaskController::class,'search']);
Route::resource('/tasks',TaskController::class);
Route::post('/tasks/{task}/done',[TaskController::class,'done']);
Route::resource('/products',ProductController::class);
