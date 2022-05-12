<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HospitalController;
use \App\Http\Controllers\PacienteController;
use \App\Http\Controllers\PacienteBasicoController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\BlockchainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//API route for register new user
//Route::post('/register', [App\Http\Controllers\V1\AuthController::class, 'register']);
//API route for login user
//Route::post('/login', [App\Http\Controllers\V1\AuthController::class, 'login'])->name('login');

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    //Route::post('/logout', [App\Http\Controllers\V1\AuthController::class, 'logout']);
});

Route::get('/', [\App\Http\Controllers\SiteController::class, "index"]);
Route::get('/login', [\App\Http\Controllers\SiteController::class, "login"])->name('login');
Route::post('/login', [\App\Http\Controllers\SiteController::class, "loginPost"]);
Route::get('/logout', [\App\Http\Controllers\SiteController::class, "logout"]);

Route::middleware(["auth", "admin"])->group(function (){
    Route::get("blockchain", [BlockchainController::class, "index"]);
    Route::get("blockchain/details", [BlockchainController::class, "details"]);
    Route::prefix('/hospital')->group(function(){
        Route::get('', [HospitalController::class, "index"]);
        Route::get('/view/{hospital}', [HospitalController::class, "show"]);
        Route::get('/create', [HospitalController::class, "create"]);
        Route::post('/create', [HospitalController::class, "store"]);
        Route::get('/update/{hospital}', [HospitalController::class, "edit"]);
        Route::post('/update/{hospital}', [HospitalController::class, "update"]);
        Route::post('/delete/{hospital}', [HospitalController::class, "destroy"]);
    });
});
Route::prefix("/indice")->middleware(["auth", "admin"])->group(function (){
    Route::get('/index', [\App\Http\Controllers\IndiceController::class, "index"]);
    Route::post('/delete/{indice}', [\App\Http\Controllers\IndiceController::class, "destroy"]);
});

Route::prefix('/paciente/self')->middleware(["auth"])->group(function(){
    Route::get('/', [PacienteController::class, "consultaPropia"]);
});

Route::prefix('/paciente')->middleware(["auth", "para_medico"])->group(function(){
    Route::get('/', [PacienteController::class, "formulario"]);
    Route::post('/', [PacienteController::class, "consulta"]);
});

Route::prefix('/paciente/basico')->middleware(["auth", "para_medico"])->group(function(){
    Route::get('/', [PacienteBasicoController::class, "formulario"]);
    Route::post('/', [PacienteBasicoController::class, "consulta"]);
});

Route::middleware(["auth","hospital"])->group(function (){
    /* Usuario: */
    Route::get('/users', [UserController::class, "index"]);
    Route::get('/users/create', [UserController::class, "create"]);
    Route::post('/users/create', [UserController::class, "store"]);
    Route::get('/users/update/{user}', [UserController::class, "edit"])->middleware(["userProtect"]);
    Route::post('/users/update/{user}', [UserController::class, "update"])->middleware(["userProtect"]);
    Route::get('/users/view/{user}', [UserController::class, "show"])->middleware(["userProtect"]);
    Route::post('/users/delete/{user}', [UserController::class, "delete"])->middleware(["userProtect"]);
});

