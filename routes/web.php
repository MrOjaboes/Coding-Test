<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});
Route::post('/sign-up', [App\Http\Controllers\AccountController::class, 'createAccount'])->name('account.sign-up');

Auth::routes();
Route::group(['prefix' => 'admin',  'middleware' => 'IsAdmin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'adminPage'])->name('admin');
});
Route::group(['prefix' => 'home',  'middleware' => 'IsUser'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
