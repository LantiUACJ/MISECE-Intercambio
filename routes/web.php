<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HospitalController;
use \App\Http\Controllers\PacienteController;
use \App\Http\Controllers\PacienteBasicoController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\PasswordRecoveryController;
use \App\Http\Controllers\BlockchainController;
use App\Http\Controllers\SistemaController;
use \App\Http\Controllers\TestController;
use \App\Http\Controllers\UserHospitalController;

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

Route::get('/', [\App\Http\Controllers\SiteController::class, "index"])->name("home");
Route::get('login', [\App\Http\Controllers\SiteController::class, "login"])->name('login');
Route::post('/login', [\App\Http\Controllers\SiteController::class, "loginPost"]);
Route::get('/logout', [\App\Http\Controllers\SiteController::class, "logout"]);

/* Rutas de admin */
Route::middleware(["auth", "admin"])->group(function (){
    Route::get("blockchain", [BlockchainController::class, "index"])->name("admin.blockchain.index");
    Route::prefix('/hospital')->group(function(){
        Route::get('', [HospitalController::class, "index"])->name("admin.hospital.index");
        Route::get('/registrar', [HospitalController::class, "create"])->name("admin.hospital.create");
        Route::post('/registrar', [HospitalController::class, "store"]);
        Route::get('/actualizar/{hospital}', [HospitalController::class, "edit"])->name("admin.hospital.edit");
        Route::post('/actualizar/{hospital}', [HospitalController::class, "update"]);
        Route::post('/borrar/{hospital}', [HospitalController::class, "destroy"])->name("admin.hospital.destroy");

        Route::prefix("usuario")->group(function (){
            Route::get('/', [UserHospitalController::class, "index"])->name("admin.usuario.index");
            Route::get('/registrar', [UserHospitalController::class, "create"])->name("admin.usuario.create");
            Route::post('/registrar', [UserHospitalController::class, "store"]);
            Route::get('/actualizar/{user}', [UserHospitalController::class, "edit"])->name("admin.usuario.edit");
            Route::post('/actualizar/{user}', [UserHospitalController::class, "update"]);
            Route::get('/{user}', [UserHospitalController::class, "show"])->name("admin.usuario.show");
        });
    });
    /* Probar módulo de procesamiento (ver si hay comunicación) */
    Route::get("test/procesamiento", [TestController::class, "testProcesamiento"]);
    
    Route::prefix("/indice")->group(function (){
        Route::get('/index', [\App\Http\Controllers\IndiceController::class, "index"]);
        Route::post('/delete/{indice}', [\App\Http\Controllers\IndiceController::class, "destroy"]);
    });
});

/* Rutas de paciente */
Route::prefix('/expediente/propio')->middleware(["auth"])->group(function(){
    Route::get('/', [PacienteController::class, "consultaPropia"])->name("paciente.expediente.propio");
    Route::post('/', [PacienteController::class, "consultaPropia"]);
});

Route::prefix('/expediente')->middleware(["auth", "para_medico"])->group(function(){
    Route::get('/', [PacienteController::class, "formulario"])->name("medico.expediente.completo");
    Route::post('/', [PacienteController::class, "consulta"]);
});

Route::prefix('/expediente/basico')->middleware(["auth", "para_medico"])->group(function(){
    Route::get('/', [PacienteBasicoController::class, "formulario"])->name("medico.expediente.basico");
    Route::post('/', [PacienteBasicoController::class, "consulta"]);
});

Route::middleware(["auth","hospital"])->group(function (){
    /* Usuario: */
    Route::prefix("usuario")->group(function (){
        Route::get('', [UserController::class, "index"])->name("hospital.usuario.index");
        Route::get('/registrar', [UserController::class, "create"])->name("hospital.usuario.create");
        Route::post('/registrar', [UserController::class, "store"]);
        Route::get('/actualizar/{user}', [UserController::class, "edit"])->name("hospital.usuario.edit")->middleware(["userProtect"]);
        Route::post('/actualizar/{user}', [UserController::class, "update"])->middleware(["userProtect"]);
        Route::get('/{user}', [UserController::class, "show"])->name("hospital.usuario.show")->middleware(["userProtect"]);
        Route::post('/borrar/{user}', [UserController::class, "delete"])->name("hospital.usuario.delete")->middleware(["userProtect"]);
    });
    Route::prefix("sistema")->group(function (){
        Route::get("", [SistemaController::class, "index"])->name("hospital.sistema.index");
        Route::get("api", [SistemaController::class, "api"])->name("hospital.sistema.api");
        Route::get("test/indice", [TestController::class, "testIndice"])->name("hospital.sistema.testIndice");
    });
});


Route::get("/user/forgot/password", [PasswordRecoveryController::class, "forgotPasswordEmail"]);
Route::post("/user/forgot/password", [PasswordRecoveryController::class, "forgotPasswordEmailSubmit"]);
Route::get("/user/forgot/password/finish", [PasswordRecoveryController::class, "forgotPasswordEmailFinish"]);
Route::get("/user/forgot/password/{token}", [PasswordRecoveryController::class, "forgotPasswordEmailToken"]);
Route::post("/user/forgot/password/{token}", [PasswordRecoveryController::class, "forgotPasswordEmailTokenSubmit"]);
