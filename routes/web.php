<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HospitalController;
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
Route::post('/register', [App\Http\Controllers\V1\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\V1\AuthController::class, 'login'])->name('login');

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\V1\AuthController::class, 'logout']);
});

Route::get('/', [\App\Http\Controllers\SiteController::class, "index"]);
/*Route::get('/login', [\App\Http\Controllers\SiteController::class, "login"])->name('login');
Route::post('/login', [\App\Http\Controllers\SiteController::class, "loginPost"]);
Route::get('/logout', [\App\Http\Controllers\SiteController::class, "logout"]);*/

Route::prefix('/hospital')->middleware(["auth"])->group(function(){
    Route::get('/index', [HospitalController::class, "index"]);
    Route::get('/view/{hospital}', [HospitalController::class, "show"]);
    Route::get('/create', [HospitalController::class, "create"]);
    Route::post('/create', [HospitalController::class, "store"]);
    Route::get('/update/{hospital}', [HospitalController::class, "edit"]);
    Route::post('/update/{hospital}', [HospitalController::class, "update"]);
    Route::post('/delete/{hospital}', [HospitalController::class, "destroy"]);
});

Route::prefix("/indice")->middleware(["auth"])->group(function (){
    Route::get('/index', [\App\Http\Controllers\IndiceController::class, "index"]);
    Route::post('/delete/{indice}', [\App\Http\Controllers\IndiceController::class, "destroy"]);
});
