<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\ApiController as ApiControllerV1;
use App\Http\Controllers\V1\TestApiController as TestApiControllerV1;

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
Route::prefix('/v1')->middleware(["auth.api"])->group(function(){
    Route::post('/expediente/{curp}', [ApiControllerV1::class, "consultarExpedientes"]);
    Route::post('/expediente/basico/{curp}', [ApiControllerV1::class, "consultarExpedientesBasico"]);
    /* Testing routes */
    Route::post('/test/expediente/{curp}', [TestApiControllerV1::class, "consultarExpedientes"]);
    Route::post('/test/expediente/basico/{curp}', [TestApiControllerV1::class, "consultarExpedientesBasico"]);
    Route::post('/test/json', [TestApiControllerV1::class, "testJson"]);
});