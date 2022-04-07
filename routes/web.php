<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
//login process
Route::get('/',[ LoginController::class, 'showlogin']);
Route::post('loginProcess',[ LoginController::class, 'login']);  // view page
Route::get('/login2',[ LoginController::class, 'login2']);

// first time create
Route::get('register',[ RegisterController::class, 'register']); // view page
Route::post('register/save',[ RegisterController::class, 'postRegister']);

//main
// Route::get('/',[ CarController::class, 'index']); //Index
Route::get('search/{refer_id}',[ CarController::class, 'indexSearch' ]); //Search Page
Route::get('carlist/{refer_id}',[ CarController::class, 'allList' ]); //All Vehicle List

//for create new
Route::get('create/{refer_id}',[ CarController::class, 'create' ]);
Route::post('store/{refer_id}',[ CarController::class, 'store' ]);

//for display details only
Route::get('show/{refer_id}/{noplate}',[ CarController::class, 'show' ]);
Route::get('result/{refer_id}', [CarController::class, 'search' ]);

//for edit
Route::get('profile/{refer_id}',[ CarController::class, 'profile' ]);
Route::post('edit/profile/{refer_id}',[ CarController::class, 'update' ]);
Route::post('edit/password/{refer_id}',[ CarController::class, 'updatePassword' ]);
Route::post('edit/vehicle/{refer_id}/{noplate}',[ CarController::class, 'updateVehicle' ]);

// logout
Route::post('logout',[ LoginController::class, 'logout' ]);

