<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    public function index()
    {
        return view('layouts.index');
    }

    public function indexSearch()
    {
        return view('layouts.indexSearch');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allList(Request $request)
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
        // return View('pages.search')->with('data',$cars);

        // // $lists = Car::all();
        // $lists = Car::paginate(10);

        return view('cars.carlist', compact('lists'))
        ->with('i', ($request->input('page', 1) - 1) * 10);

        // return view('yourview',compact('records')->with('i', ($request->input('page', 1) - 1) * 20);

        // dd($lists);

    }

    public function test()
    {
        echo "test";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plate = Car::where('noplate', $request->noplate);

        if($plate->exists())
        {   
            // If already exist, keluar error
            return redirect()->back()->with('error', 'The plate number already exists.');
            // echo"Ada";
        }else{
            // If not yet, then do insert function
            
            Car::create([
                'noplate' => request('noplate'),
                'description' => request('description'),
                'type' => request('type'),
                'staffname' => request('staffname'),
                'department' => request('department'),
                'unit' => request('unit'),
                'nophone' => request('nophone'),
                // dd($request->valid,),
                'valid' => request('valid'),
            ]);
            //success go to all list
            return redirect('/carlist')->with('success', 'The vehicle details is added successfully.');
            // echo"takde";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Car::findOrFail($id);

        return view('cars.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $car = Car::findOrFail($id);

        // return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $car_id = $request->id;
        // $car = Car::where("id", $car_id)->update($request->all());

        // if($car == 1) {
        //     return response()->json(["status" => "success", "message" => "Success! Vehicle details updated."]);
        // }

        // else {
        //     return response()->json(["status" => "failed", "message" => "Alert! Vehicle details not updated."]);
        // }

        // $car = Car::findOrFail($id);

        // $request->validate([
        //     'noplate' => 'required|max:9',
        //     'description' => 'required',
        //     'type' => 'required',
        //     'staffname' => 'required',
        //     'department' => 'required',
        //     'unit' => 'required',
        //     'nophone' => 'required|max:11|numeric'
        // ]);

        // $id->update($request->all());

        // return redirect('carlist')->with('success', 'Vehicle details is successfully updated. Thank You');
    }

    public function search(Request $request) 
    {
        $owner = Car::where('noplate' , $request->noplate)->first();

        // dd($owner);
        //return view with result
        if($owner == null ) 
        {
            return view('cars.result')->with('error', 'The plate number not exists.');
            
        } else {
            return view('cars.result', compact('owner'));
        }
        
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
