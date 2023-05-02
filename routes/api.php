<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'account'], function () {
    Route::post('/sign-up', [App\Http\Controllers\API\AccountController::class, 'register']);
    Route::post('/sign-in', [App\Http\Controllers\API\AccountController::class, 'login']);
    Route::post('/sign-out', [App\Http\Controllers\API\AccountController::class, 'logout'])->middleware(['auth:sanctum']);
});

Route::group(['prefix' => 'admin','middleware' => 'auth:sanctum'], function () {
  Route::get('/users', [App\Http\Controllers\API\AdminController::class, 'index']);
});
