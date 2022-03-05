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
Route::group(['middleware' => ['throttle:8,1440']], function () {
    Route::post('sport-type', [\App\Http\Controllers\SportTypeController::class, "store"])->name('sport-type.store');
});
Route::apiResource('sport-type', \App\Http\Controllers\SportTypeController::class, ['except' => ['store']]);
Route::apiResource('package', \App\Http\Controllers\PackageController::class);
