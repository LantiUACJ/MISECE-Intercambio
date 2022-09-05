<?php

use App\Fhir\Resource\Bundle;
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
Route::get('login', [\App\Http\Controllers\SiteController::class, "login"])->name('login');
Route::post('/login', [\App\Http\Controllers\SiteController::class, "loginPost"])->name('login');
Route::get('/logout', [\App\Http\Controllers\SiteController::class, "logout"]);

Route::middleware(["auth", "admin"])->group(function (){
    Route::get("blockchain", [BlockchainController::class, "index"]);
    Route::get("blockchain/details/{log}", [BlockchainController::class, "details"]);
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

use App\Fhir\Resource\MedicationRequest;
use App\Models\Log;
use App\Tools\CurlHelper;
use App\Tools\LogChain;
use Illuminate\Support\Facades\Storage;

Route::get("test", function (){
    set_time_limit(-1);
    $start = microtime(true);

    $log = Log::orderBy("id", "desc")->first();
    if(!$log){
        $log = new Log();
        $log->fecha = \Carbon\Carbon::now()->format("Y-m-d H:i:s");
        $log->paciente = "Paciente";
        $log->hospital = "Un hospital";
        $log->consultor = "SR patricio";
        $log->respuestas = auth()->user()->id;
    }
    
    $i = 1;
    for($i = 0; $i<1000; $i++){
        $stLog = Log::create([
            "fecha"=> \Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$log->fecha)->addSecond($i),
            "paciente"=>"STD $i-",
            "hospital"=>$log->hospital,
            "consultor"=>$log->consultor,
            "respuestas"=>auth()->user()->id
        ]);
        //$stLog = Log::where("id",15159)->first();
        $stLog->paciente .= $stLog->id;
        $stLog->save();
        $logChain = new LogChain();
        $logChain->store($stLog);
    }

    echo (number_format(microtime(true) - $start,4)*1000) . " Milisegundos";
})->middleware(["auth"]);

Route::get("one", function (){
    set_time_limit(-1);
    $start = microtime(true);

    $log = Log::orderBy("id", "desc")->first();
    
    $i = 1;
    //for($i = 0; $i<5000; $i++){
        $stLog = Log::create([
            "fecha"=> \Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$log->fecha)->addSecond($i),
            "paciente"=>"STD $i-",
            "hospital"=>$log->hospital,
            "consultor"=>$log->consultor,
            "respuestas"=>$log->respuestas
        ]);
        $stLog = Log::where("id",105)->first();
        ///$stLog->paciente .= $stLog->id;
        //$stLog->save();
        $logChain = new LogChain();
        $logChain->store($stLog);
    //}

    echo (number_format(microtime(true) - $start,4)*1000) . " Milisegundos";
});

Route::get("car", function (){
    $logChain = new LogChain();
    return $logChain->getTransactionCountAcc();
});

Route::get("look/{start}/{end}", function ($start, $end){
    set_time_limit(-1);
    $logChain = new LogChain();
    for($i = $start; $i<=$end; $i++){
        echo $logChain->find($i) . "<br>";
    }
});

Route::get("json", function (){
    return view("form");
});

Route::get("find/{id}", function ($id){
    $log = Log::where("id", $id)->first();
    $logChain = new LogChain();
    return $logChain->find($log->id);
});

Route::get("deploy", function (){
    $logChain = new LogChain();
    return $logChain->deploy();
});

Route::get("errorFree", function (){
    set_time_limit(-1);
    $start = microtime(true);
    $i = 1;
    $logChain = new LogChain();
    //$logChain->deploy();

    for($i = 0; $i<10; $i++){
        $logChain->errorFreeTransaction();
    }

    echo (number_format(microtime(true) - $start,4)*1000) . " Milisegundos";
});

Route::get("json", function (){
    $myfile = fopen("json_pruebas/med.json", "r") or die("Unable to open file!");
    $json = fread($myfile,filesize("json_pruebas/med.json"));
    fclose($myfile);

    $bundle = new Bundle(json_decode($json));

    return view("pdf",["data"=>[
            ["bundle"=>$bundle, "hospital"=>new \App\Models\Hospital(["nombre"=>"Hola"])]
        ]
    ]);

    /*
    $texto = "el paciente tiene: hemorragia →coroidea<<122003>> y hemorragia →coroidea<<122004>> otro texto sin concepto";
    $textos = explode(">>", $texto);
    foreach($textos as $id => $txt){
        if(strpos($txt,"<<") !== false){
            $textos[$id] = [
                "pre-texto"=> explode("→", $txt)[0], 
                "texto" => explode("<<",explode("→", $txt)[1])[0], 
                "codigo" => explode("<<", str_replace("→","",$txt))[1]
            ];
        }
    }
    return $textos;*/
});