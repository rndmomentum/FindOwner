<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarController;
use App\Models\Car;

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

Route::middleware('auth:sanctum')->get('/carDetails', function (Request $request) {
    return $request->user();
});


Route::get('car/all', 'Api\CarController@allCar');
Route::get('car/{ic}', 'Api\CarController@userCar');
// Route::post('login', 'Api\AuthController@login');