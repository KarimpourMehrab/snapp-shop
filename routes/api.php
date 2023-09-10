<?php

use App\Http\Controllers\RemittanceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('remittance')->controller(RemittanceController::class)->group(function () {
    Route::post('', 'store');
});

Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('latestMostTransaction','latestMostTransaction');
});
