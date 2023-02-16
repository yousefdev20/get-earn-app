<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('users', [UserController::class, 'index']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
    Route::put('users/{id}', [UserController::class, 'update']);
});
