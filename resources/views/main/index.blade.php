@extends('layouts.appIndex')

@section('content')

    <div class="col-md-5 p-4">

        <div class="card shadow-lg mx-auto">
            <h5 class="text-center" style="padding: 10px 0px 10px; background-color: #810000; color:white">FindOwner</h5>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-12">
                        <img src="img/icon2.png" style="width: 150px" class="img-fluid col-md-4" /><br>
                        <strong style="font-family: 'Helvetica';">Momentum Internet Sdn Bhd</strong>
                    </div>

                    <div class="col-md-12 pt-4 mb-3">
                        <div class="d-grid mx-auto col-md-8">
                            <a href="{{ url('search') }}/{{ $refer_id }}" class="btn btn-dark btn-block btn-md">Search Owner</a>
                        </div><br>

                        <div class="d-grid mx-auto col-md-8">
                            <a href="{{ url('create') }}/{{ $refer_id }}" class="btn btn-dark btn-block btn-md" >Add New Vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection         