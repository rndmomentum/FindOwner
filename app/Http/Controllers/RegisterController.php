<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('main.firstCreate');
    }

    public function postRegister(Request $request) {
        
        $plate = Car::where('noplate', $request->noplate);

        if($plate->exists())
        {   
            return redirect()->back()->with('error', 'The plate number already exists.'); // If already exist, error
        } else {
            //Start
            $filename = $request->file('img_path');
            if($filename != '')
            {   
                $extension = $filename->getClientOriginalExtension();
                
                if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png' || $extension == 'JPEG' || $extension == 'JPG' || $extension == 'PNG')
                {
                    $name = $filename->getClientOriginalName();
                    $uniqe = 'IMG'. uniqid() . '.' . $extension;
                    $dirpath = public_path('assets/vehicles/');
                    $filename->move($dirpath, $uniqe); 

                    $img_path = 'assets/vehicles/'.$uniqe;
                } else {
                    return redirect()->back()->with('error','Not valid file. Please insert jpeg, jpg & png only.');
                }
            } else {
                $img_path = NULL;
            }
            // End
            
            $validatedData = $request->validate([
                'password' => 'required|string|min:8|confirmed|same:password_confirmation',
                // 'password_confirmation' => 'min:8'
            ]);

            $password = bcrypt($request->get('password'));

            $new = Car::create([
                'noplate' => request('noplate'),
                'description' => request('description'),
                'type' => request('type'),
                'staffname' => request('staffname'),
                'department' => request('department'),
                'unit' => request('unit'),
                'nophone' => request('nophone'),
                'password' => $password,
                'img_path' => $img_path,
                // 'refer_id' => count($kpimasters) > 0 ? $kpimasters->sortByDesc('created_at')->first()->id : '0',
            ]);

            $newId = $new->id;
            
            //select back to insert refer_id
            $owner = Car::where('id' , $newId)->first();

            $owner->refer_id = $newId;
            $owner->save();

            //success go to all list
            return redirect('/login')->with('success', 'The vehicle details is saved successfully.');
        
        }
    }
}
