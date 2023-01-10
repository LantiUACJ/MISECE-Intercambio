<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiTestController;

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
Route::prefix('/{version}')->middleware(["auth.api"])->group(function(){
    Route::post('/expediente/{curp}', [ApiController::class, "consultarExpedientes"]);
    Route::post('/expediente/basico/{curp}', [ApiController::class, "consultarExpedientesBasico"]);
    /* Testing routes */
    Route::post('/test/expediente/{curp}', [ApiTestController::class, "consultarExpedientes"]);
    Route::post('/test/expediente/basico/{curp}', [ApiTestController::class, "consultarExpedientesBasico"]);
    Route::post('/test/json', [ApiTestController::class, "testJson"]);
});

Route::post("/repositorio", [ApiController::class, "repositorio"]);