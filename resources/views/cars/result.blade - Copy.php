@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div style="background-color: black; color:white; padding: 10px 30px 10px;">
                <h3 style="text-align: center;">Vehicle Details</h3>
            </div> 
            <div class="card-body" style="padding: 10px 80px 0px;">
            @if(session('error'))
                <div class="alert alert-danger">
				    <strong>Sorry!</strong> {{ session('error') }}
			    </div>
            @endif

  
            <br>
            <div class="fmn-3 row">
                <label for="type" class="col-sm-2 col-form-label">Vechicle Type</label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" name="type" value="{{ $owner->type }}" readonly />
                </div>
            </div><br>

            <div class="fmn-3 row">
                <label for="name" class="col-sm-2 col-form-label">Team Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $owner->staffname }}" readonly />
                </div>
            </div><br>

            <div class="fmn-3 row">
                <label for="nophone" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $owner->nophone }}" readonly />
                </div>
            </div><br>

            <div class="fmn-3 row">
                <label for="department" class="col-sm-2 col-form-label">Department</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $owner->department }}" readonly />
                </div>
            </div><br>

            <div class="fmn-3 row">
                <label for="unit" class="col-sm-2 col-form-label">Department Unit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $owner->unit }}" readonly />
                </div>
            </div><br>

            <div class="fmn-3 row">
                <label for="description" class="col-sm-2 col-form-label">Vehicle Description:</label>
                <div class="col-sm-10">
                    <textarea rows="2" class="form-control" readonly>{!! $owner->description !!}</textarea>
                </div>
            </div><br><br>

            <a href="{{ route('FindMeNow/all') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>

@endsection