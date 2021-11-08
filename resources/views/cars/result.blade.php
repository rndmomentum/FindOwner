@extends('layouts.app')

@section('content')

    @if(isset($owner))

        <small><div class="alert alert-secondary mt-3">
            <div class="row">
                <a href="{{ route('FindMeNow/search') }}" class="pr-1" style="color: black"><i class="bi bi-arrow-left pl-2 pr-2"></i></a>
                <a href="{{ route('index') }}" class="pr-1" style="color: black"> Home </a> /
                <a href="{{ route('FindMeNow/search') }}" class="pr-1 pl-1" style="color: black"> Search </a> /
                <a href="" class="alert-link pl-1 pr-1" style="color: black">Vehicle Detail</a>
            </div>
        </div></small>

        <div class="card shadow-lg mt-3 mb-4">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <div class="mb-3" style="background-color: #810000; color:white; padding: 10px 30px 10px; text-align: center">
                            <h5>Vehicle Details</h5>
                        </div>
                    </div>

                    <div class="col-md-12 text-center mb-3">
                        <h5>Plate Number <p style="text-transform: uppercase">{{ $owner->noplate }}</p></h5>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="table-responsive">
                            <table class="table" style="border: 1px solid lightgray;">
                                <tbody>
                                    <tr>
                                        <th class="col-3" style="background-color: #810000; color: white; font-size: 10pt">Type</th>
                                        <td style="font-size: 10pt">{{ $owner->type }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #810000; color: white; font-size: 10pt">Name</th>
                                        <td style="text-transform: capitalize; font-size: 10pt">{{ $owner->staffname }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #810000; color: white; font-size: 10pt">Department</th>
                                        <td style="text-transform: capitalize; font-size: 10pt">{{ $owner->department }}
                                        @if($owner->unit == '')
                                            &nbsp;
                                        @else
                                            ( {{ $owner->unit }} )
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #810000; color: white; font-size: 10pt">Phone</th>
                                        <td style="font-size: 10pt"><a href="tel:+6{{ $owner->nophone }}">+6{{ $owner->nophone }}</a></td>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" style="background-color: #810000; color: white; font-size: 10pt">Description</th>
                                        <td rowspan="2" style="font-size: 10pt">{!! $owner->description !!}</td>
                                    </tr>
                                </tbody>
                            </table>                        
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Back</a>
                    </div>

                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="alert alert-danger">
                    <small><strong>Sorry!</strong> The plate number not exists.</small>
                </div>
            </div>
        </div>

        <div class="card shadow-lg mb-4 mx-auto">
            <div class="card-body text-center">
                <div class="col-md-12">
                    <div class="d-grid mx-auto col-11 pb-3">
                        <h5>Register your vehicle <a href="{{ route('FindMeNow/create') }}" ><strong>HERE</strong></a></h5>
                    </div>
                    <div class="d-grid mx-auto col-11 pb-3">
                        <a href="{{ route('FindMeNow/search') }}" class="btn btn-block btn-danger btn-sm">Back</a>
                    </div>  
                </div>
            </div>
        </div>
    @endif

@endsection