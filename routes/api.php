<?php

use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Auth\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('register/{name}', [RegisterController::class, 'index'])
    ->middleware(['isValidLink']);

Route::post('register', [RegisterController::class, 'store']);
Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth:user']], function () {
    Route::get('users', [UserController::class, 'index']);
    Route::delete('user/{user}', [UserController::class, 'destroy']);
});
