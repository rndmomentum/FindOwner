<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Car;
// use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{   
    public function showlogin()
    {
        return view('main.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'ic' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('ic', 'password');

        if(Auth::guard('carDetails')->attempt($credentials)) {
            $refer_id = Auth::guard('carDetails')->user()->refer_id;

            return redirect('search/'.$refer_id)->with('success', 'Login successfull.');
        }

        return redirect('/')->with('error','You have entered invalid credentials. Please double-check your IC number and password.');
    }

    public function logout() {
        
        Auth::guard('carDetails')->logout();
  
        return redirect('/');
    }
}