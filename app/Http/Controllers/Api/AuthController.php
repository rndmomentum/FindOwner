<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
// use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = ['noplate' => $request->noplate, 'password' => $request->password];

        if(Auth::guard('carDetails')->attempt($credentials)) {
            $refer_id = Auth::guard('carDetails')->user()->refer_id;
            $usercars = Car::where('refer_id', $refer_id)->get();

            return $usercars;
        } else {
            $failed = ['error' => 'failed'];
            return $failed;
        }
    }

    public function authenticate(Request $request)
    {
        $authData = $request->validate([
            'authToken' => 'required',
        ]);

        // $user = Auth::guard('carApi')->user();
        $user = Auth::guard('carDetails')->user()->refer_id;

        return response([
            'status' => 'authenticated',
            'user' => $user,
            'token' => $request->authToken
        ]);
    }
}
