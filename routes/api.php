<?php

use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WalletController;
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


Route::post('register', [RegisterController::class, 'store']);
Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => ['isValidLink']], function () {
    Route::get('view/{referred_by}', [ViewController::class, 'show']);
    Route::get('register/{referred_by}', [ViewController::class, 'index']);
    Route::post('register/{referred_by}', [RegisterController::class, 'store'])->name('referred_by');
});

Route::group(['middleware' => ['auth:user']], function () {
    Route::get('users', [UserController::class, 'referredUsers']);
    Route::get('user_wallet/{user}', [WalletController::class, 'getWalletByUser']);
    Route::get('report', [RegisterController::class, 'registrationReport']);
});
