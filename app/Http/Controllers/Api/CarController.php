<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function allCar()
    {
        $data = Car::all();

        return response([
            'status' => '200',
            'message' => 'Successfully fetch data guest',
            'data' => $data
        ]);
    }

    public function userCar(Request $request, $ic)
    {
        $users = Car::where('ic', $ic)->get();

        return response([
            'status' => '200',
            'message' => 'Successfully fetch data guest',
            'data' => $users
        ]);
    }
}
