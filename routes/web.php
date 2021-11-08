<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('cars', CarController::class);
Route::get('/',[ CarController::class, 'index'])->name('index');
Route::get('/search',[ CarController::class, 'indexSearch' ])->name('FindMeNow/search');
// Route::get('cars/carlist', 'CarController@allList');
Route::get('/carlist',[ CarController::class, 'allList' ])->name('FindMeNow/all');

//for create
Route::get('/create',[ CarController::class, 'create' ])->name('FindMeNow/create');
Route::post('/store',[ CarController::class, 'store' ])->name('FindMeNow/store');

//for edit details
// Route::get('/edit/{noplate}',[ CarController::class, 'edit' ])->name('FindMeNow/edit');
// Route::get('/update/{noplate}',[ CarController::class, 'update' ])->name('FindMeNow/update');
//for view details only
Route::get('/show/{noplate}',[ CarController::class, 'show' ])->name('FindMeNow/show');
//search NO PLATE function
Route::get('result/', [CarController::class, 'search' ])->name('FindMeNow/result');