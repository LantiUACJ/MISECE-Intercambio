<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\ApiController as ApiControllerV1;

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
Route::prefix('/v1')->name('admin.')->middleware(["auth.api"])->group(function(){
    Route::post('/expediente/{curp}', [ApiControllerV1::class, "consultarExpedientes"])->name("pacientes");
});