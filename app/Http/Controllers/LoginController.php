<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\LoginController as DefaultLoginController;

class LoginController extends Controller
{   
    // protected $redirectTo = '/login';

    // public function __construct()
    // {
    //     $this->middleware('guest:guardCar')->except('logout');
    // }

    public function showlogin()
    {
        return view('main.login');
    }

    public function login(Request $request)
    {
        // dd('john');

        $request->validate([
            'noplate' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('noplate', 'password');

        if(Auth::guard('carDetails')->attempt($credentials)) {
            $refer_id = Auth::guard('carDetails')->user()->refer_id;

            return redirect('search/'.$refer_id)->with('success', 'Login successfull.');
        }

        return redirect('/')->with('error','You have entered invalid credentials. Please double-check your plate number and password.');
    }

    public function logout() {
        // Session::flush();
        Auth::guard('carDetails')->logout();
  
        return redirect('/');
    }
}
