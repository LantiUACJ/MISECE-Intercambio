<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HospitalController;
use \App\Http\Controllers\PacienteController;
use \App\Http\Controllers\PacienteBasicoController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\BlockchainController;
use \App\Http\Controllers\TestController;
use App\Http\Controllers\UserHospitalController;

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
Route::get('/login', [\App\Http\Controllers\SiteController::class, "login"])->name('login');
Route::post('/login', [\App\Http\Controllers\SiteController::class, "loginPost"])->name('login');
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
    Route::prefix('/hos')->group(function(){
        Route::get('/usuario', [UserHospitalController::class, "index"]);
        Route::get('/usuario/registrar', [UserHospitalController::class, "create"]);
        Route::post('/usuario/registrar', [UserHospitalController::class, "store"]);
        Route::get('/usuario/edit/{user}', [UserHospitalController::class, "edit"]);
        Route::post('/usuario/edit/{user}', [UserHospitalController::class, "update"]);
        Route::get('/usuario/{user}', [UserHospitalController::class, "show"]);
    });
    Route::get("test/procesamiento", [TestController::class, "testProcesamiento"]);
});
Route::prefix("/indice")->middleware(["auth", "admin"])->group(function (){
    Route::get('/index', [\App\Http\Controllers\IndiceController::class, "index"]);
    Route::post('/delete/{indice}', [\App\Http\Controllers\IndiceController::class, "destroy"]);
});

Route::prefix('/paciente/self')->middleware(["auth"])->group(function(){
    Route::get('/', [PacienteController::class, "consultaPropia"]);
    Route::post('/', [PacienteController::class, "consultaPropia"]);
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
    Route::get("test/indice", [TestController::class, "testIndice"]);
});

use App\Fhir\Resource\Bundle;
use Illuminate\Support\Facades\Storage;

Route::get("test", function (){
    /*
    $archivoJson = fopen("json_pruebas/big.json", "r");
    $jsonTxt = fread($archivoJson,filesize("json_pruebas/big.json"));
    $json = json_decode($jsonTxt);
    $bundle = new Bundle($json);
    $dogs = ["data"=>[["bundle"=>$bundle, "hospital"=>\App\Models\Hospital::where("id", ">", "0")->first()]]];
    return view("pdf",$dogs);
    */
    $inicio = microtime(true);

    //$input["curp"] = "GADE19830329MTLRMA83Q";
    $input["curp"] = "LUSA19800813HOCELI80Y";
    $ph = new \App\Tools\PetitionHelper($input['curp'], \App\Models\Hospital::where("id", "4")->first(), "Juanito perez", 1);
    if(!$ph->searchPatient()){
        return view("paciente.resultado", ["nombre"=>"ERROR", "data" => "no se encontró el paciente"]);
    }
    $ph->getData();
    $datos = microtime(true);
    //Storage::disk('s3')->put('input/test2.json', json_encode($ph->data[0]));
    //return $ph->renderHtml();
    return view("pdf",["data"=>$ph->data, "extra"=>["inicio"=>$inicio, "datos"=>$datos]]);
});