<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Session;

class CarController extends Controller
{
    // search page
    public function indexSearch()
    {
        $refer_id = Auth::guard('carDetails')->user()->refer_id;

        return view('main.indexSearch', compact('refer_id'));
    }

    // search result
    public function search(Request $request, $refer_id) 
    {
        $owner = Car::where('noplate' , $request->noplate)->first();

        //return view with result
        if($owner == null ) 
        {
            return view('cars.result', compact('refer_id'))->with('error', 'The plate number not exists.');
            
        } else {
            return view('cars.result', compact('owner', 'refer_id'));
        }
        
    }

    // carlist
    public function allList(Request $request, $refer_id)
    {
        $searchall =  $request->input('all');
        if($searchall!=""){
            $lists = Car::where(function ($query) use ($searchall){
                $query->where('type', 'like', '%'.$searchall.'%')
                    ->orWhere('staffname', 'like', '%'.$searchall.'%')
                    ->orWhere('department', 'like', '%'.$searchall.'%')
                    ->orWhere('unit', 'like', '%'.$searchall.'%')
                    ->orWhere('noplate', 'like', '%'.$searchall.'%')
                    ->orderBy('created_at','desc')->get();
            })
            ->paginate(10);
            $lists->appends(['all' => $searchall]);
        }
        else{
            $lists = Car::orderBy('created_at','desc')->paginate(10);
        }

        return view('cars.carlist', compact('lists', 'refer_id'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    // create new vehicle
    public function create($refer_id)
    {
        $owner = Auth::guard('carDetails')->user();
        
        return view('cars.create', compact('owner', 'refer_id'));
    }    

    // create / store
    public function store($refer_id, Request $request)
    {
        $plate = Car::where('noplate', $request->noplate);

        if($plate->exists())
        {   
            return redirect()->back()->with('error', 'The plate number already exists.'); // If already exist, error
        }else{
            // If not yet, then do insert function
            
            // Start Image
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
            // End Image

            Car::create([
                'noplate' => request('noplate'),
                'description' => request('description'),
                'type' => request('type'),
                'staffname' => Auth::guard('carDetails')->user()->staffname,
                'department' => Auth::guard('carDetails')->user()->department,
                'unit' => Auth::guard('carDetails')->user()->unit,
                'nophone' => Auth::guard('carDetails')->user()->nophone,
                'img_path' => $img_path,
                'password' => Auth::guard('carDetails')->user()->password,
                'refer_id' => Auth::guard('carDetails')->user()->refer_id,
            ]);
            
            //success go to all list
            return redirect('carlist/'.$refer_id)->with('success', 'The vehicle details is added successfully.');
        }
    }

    // show
    public function show($refer_id, $noplate)
    {
        $owner = Car::where('noplate', $noplate)->first();

        return view('cars.show', compact('owner', 'refer_id'));
    }

    // profile view
    public function profile($refer_id)
    {
        $car = Auth::guard('carDetails')->user();
        $lists = Car::where('refer_id', $refer_id)->get();
        $count = count($lists);

        return view('cars.profile', compact('car', 'lists', 'refer_id', 'count'))
        ->with('i')->withInput(['pill' => 'v-pills-profile']);
    }

    // update profile
    public function update(Request $request, $refer_id)
    {
        $owner = Car::where('refer_id', $refer_id)->get();
        $count_owner = count($owner);

        for($i=0; $i<$count_owner; $i++)
        {
            $update = Car::where('refer_id', $refer_id);

            $update -> update([
                'staffname' => request('staffname'),
                'nophone' => request('nophone'),
                'department' => request('department'),
                'unit' => request('unit'),
            ]);
        }

        return redirect('profile/'.$refer_id)->withInput(['pill' => 'v-pills-profile'])->with('success', 'Vehicle details is successfully updated. Thank You');
    }

    // update password
    public function updatePassword(Request $request, $refer_id)
    {
        if (!(Hash::check($request->get('current-password'), Auth::guard('carDetails')->user()->password))) {
            // The passwords matches
            return redirect('profile/'.$refer_id)->withInput(['pill' => 'v-pills-profile'])->with("error", "Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect('profile/'.$refer_id)->withInput(['pill' => 'v-pills-profile'])->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        $owner = Car::where('refer_id', $refer_id)->get();
        $count_owner = count($owner);

        for($i=0; $i<$count_owner; $i++)
        {
            $update = Car::where('refer_id', $refer_id);

            $update -> update([
                'password' => bcrypt($request->get('new-password'))
            ]);
        }

        return redirect('profile/'.$refer_id)->withInput(['pill' => 'v-pills-profile'])->with("success", "Password successfully changed!");
    }

    // update vehicle
    public function updateVehicle($refer_id, $noplate, Request $request)
    {
        $plate = Car::where('noplate', $noplate)->first();
        
        // Start Image
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

                $plate->noplate = $request->noplate;
                $plate->description = $request->description;
                $plate->type = $request->type;
                $plate->img_path = $img_path;

            } else {
                return redirect('profile/'.$refer_id)->withInput(['pill' => 'v-pills-vehicle'])->with('error','Not valid file. Please insert jpeg, jpg & png only.');
            }
        } else {

            $plate->noplate = $request->noplate;
            $plate->description = $request->description;
            $plate->type = $request->type;
        } // End Image

        $plate->save();

        return redirect('profile/'.$refer_id)->withInput(['pill' => 'v-pills-vehicle'])->with('success', 'Vehicle details is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
