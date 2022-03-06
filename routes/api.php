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

Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResource('sport-type', \App\Http\Controllers\SportTypeController::class, ['except' => ['store']]);
    Route::apiResource('package', \App\Http\Controllers\PackageController::class);
    Route::apiResource('package-user', \App\Http\Controllers\PackageUserController::class);
    Route::get('user', [\App\Http\Controllers\UserController::class, "index"])->name('user');
});

Route::group(['middleware' => ['auth:api', 'throttle:10,1440']], function () {
    Route::post('sport-type', [\App\Http\Controllers\SportTypeController::class, "store"])->name('sport-type.store');
});

Route::post('login', [\App\Http\Controllers\UserController::class, "login"])->name('login');
Route::post('registration', [\App\Http\Controllers\UserController::class, "registration"])->name('registration');

