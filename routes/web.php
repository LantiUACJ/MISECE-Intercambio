<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HospitalController;
use \App\Http\Controllers\PacienteController;
use \App\Http\Controllers\PacienteBasicoController;
use \App\Http\Controllers\UserController;
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

Route::prefix('/hospital')->middleware(["auth", "admin"])->group(function(){
    Route::get('', [HospitalController::class, "index"]);
    Route::get('/view/{hospital}', [HospitalController::class, "show"]);
    Route::get('/create', [HospitalController::class, "create"]);
    Route::post('/create', [HospitalController::class, "store"]);
    Route::get('/update/{hospital}', [HospitalController::class, "edit"]);
    Route::post('/update/{hospital}', [HospitalController::class, "update"]);
    Route::post('/delete/{hospital}', [HospitalController::class, "destroy"]);
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

Route::get("test/{view}", function ($view){
    return view("pantallas.".str_replace('.html', '', $view));
});

Route::get("hex", function (){
    $hex = "0x308631e10000000000000000000000000000000000000000000000000000000000000040323032322d30352d35352031303a31303a33343300000000000000000000000000000000000000000000000000000000000000000000000000000000000000e37b226665636861223a22323032322d30352d35352031303a31303a333433222c2270616369656e7465223a224d454a44483348383337343731222c22686f73706974616c223a22484f53504954414c2044452050525545424120233330333834222c22636f6e73756c746f72223a2244522e204a55414e49544f20504552455a20504f5441544f222c2272657370756573746173223a22484f53504954414c204445205052554542412023322c20484f53504954414c204445205052554542412023312c20484f53504954414c2044452050525545424120233437383136333834227d0000000000000000000000000000000000000000000000000000000000";
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }

    
    echo $hex . "<br>" . $string;
});