<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
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


Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);

Route::middleware('auth:api')->group( function () {
    Route::get('get-all-posts', [PostController::class,'index']);
    Route::get('get-specefic-post/{id}', [PostController::class,'show']);
    Route::post('create-post', [PostController::class,'store']);
    Route::put('update-post/{id}', [PostController::class,'update']);
    Route::delete('destroy-post/{id}', [PostController::class,'destroy']);
});
