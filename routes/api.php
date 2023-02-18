<?php

use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Auth\RegisterController;
use App\Http\Controllers\UserController;
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

Route::post('register/{referred_by}', [RegisterController::class, 'store'])
    ->middleware(['isValidLink'])->name('referred_by');

Route::post('register', [RegisterController::class, 'store']);
Route::post('login', [LoginController::class, 'login']);


Route::group(['middleware' => ['auth:user']], function () {
    Route::get('users', [UserController::class, 'index']);
    Route::get('user_wallet/{user}', [WalletController::class, 'getWalletByUser']);
});
