@extends('layouts.app')

@section('content')
    <div class="col-md-12 mt-3">
        @if(session('error'))
            <div class="alert alert-danger">
                <small><strong>Sorry!</strong> {{ session('error') }}</small>
            </div>
        @endif
    </div>

    @if(URL::previous() === route('FindMeNow/all'))
        <small><div class="alert alert-secondary mt-3">
            <div class="row">
                <a href="{{ route('FindMeNow/all') }}" class="pr-1" style="color: black"><i class="bi bi-arrow-left pl-2 pr-2"></i></a>
                <a href="{{ route('index') }}" class="pr-1" style="color: black"> Home </a> /
                <a href="{{ route('FindMeNow/search') }}" class="pr-1 pl-1" style="color: black"> Search </a> /
                <a href="{{ route('FindMeNow/all') }}" class="pr-1 pl-1" style="color: black"> Vehicle List </a> /
                <a class="alert-link pl-1 pr-1" style="color: black">Create Detail</a>
            </div>
        </div></small>
    @elseif(URL::previous() === route('index'))
        <small><div class="alert alert-secondary mt-3">
            <div class="row">
                <a href="{{ route('index') }}" class="pr-1" style="color: black"><i class="bi bi-arrow-left pl-2 pr-2"></i></a>
                <a href="{{ route('index') }}" class="pr-1" style="color: black"> Home </a> /
                <a href="" class="alert-link pl-1 pr-1" style="color: black">Create Detail</a>
            </div>
        </div></small> 
    @else
        <small><div class="alert alert-secondary mt-3">
            <div class="row">
                <a href="{{ route('FindMeNow/search') }}" class="pr-1" style="color: black"><i class="bi bi-arrow-left pl-2 pr-2"></i></a>
                <a href="{{ route('index') }}" class="pr-1" style="color: black"> Home </a> /
                <a href="{{ route('FindMeNow/search') }}" class="pr-1 pl-1" style="color: black"> Search </a> /
                <a class="pl-1 pr-1" style="color: black">Create Detail</a>
            </div>
        </div></small>
    @endif

    <div class="card shadow-lg mt-3 mb-4">
        <div class="card-body">
            <div class="row">

                <div class="col-md-12 mb-3">
                    <div class="mb-3" style="background-color: #810000; color:white; padding: 10px 30px 10px; text-align: center">
                        <h5> Create Vehicle Detail </h5>
                    </div>
                    <div class="border border-danger pt-2">
                        <small><p class="text-justify text-center"><span class="text-danger">*</span> 
                            Please be reminded that the plate number can be insert only once and this information cannot be modify. Thank You.</p>
                        </small>
                    </div>
                </div>
              
                <div class="col-md-12">
                    <form method="post" action="{{ route('FindMeNow/store') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <label for="type" class="col-sm-12 col-form-label col-md-2" style="font-size: 10pt">Type<span class="text-danger">*</span></label>
                            <div class="col-sm-10 col-md-4 mb-3">
                                <select class="custom-select" name="type" id="validationCustom01" style="font-size: 10pt" required>
                                    <option value="">Choose...</option>
                                    <option value="Car">Car</option>
                                    <option value="Motorcycle">Motorcycle</option>	
                                </select>
                                <div class="invalid-feedback">
                                    Please select a vehicle type.
                                </div>
                            </div>

                            <label for="plate" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Plate No.<span class="text-danger">*</span></label>
                            <div class="col-sm-8 col-md-4 mb-3">
                                <input type="text" class="form-control" name="noplate" id="validationCustom02" style="font-size: 10pt" placeholder="Plate Number (Nospace-eg:XXX0000)" pattern="^[-a-zA-Z0-9@\.+_]+$" title="Please remove space between characters" minlength="4" required/>
                                <div class="invalid-feedback">
                                    Please provide a plate number(Make sure no space).
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="name" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Team Name<span class="text-danger">*</span></label>
                            <div class="col-sm-8 col-md-4 mb-3">
                                <input type="text" class="form-control" name="staffname" id="validationCustom03" style="text-transform:capitalize; font-size: 10pt" placeholder="Full Name" required/>
                                <div class="invalid-feedback">
                                    Please provide a full name.
                                </div>
                            </div>

                            <label for="nophone" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Phone No.<span class="text-danger">*</span></label>
                            <div class="col-sm-8 col-md-4 mb-3">
                                <input type="text" class="form-control" name="nophone" id="validationCustom04" style="font-size: 10pt" placeholder="Phone Number (Nospace-eg: 0100000000)" pattern="[0-9]+" required/>
                                <div class="invalid-feedback">
                                    Please provide a valid phone number.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="department" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Department<span class="text-danger">*</span></label>
                            <div class="col-sm-8 col-md-4 mb-3">
                                <select class="custom-select" name="department" id="validationCustom05" style="font-size: 10pt" required>
                                    <option value="">Choose Department...</option>
                                    <option value="COD">Corporate Office Division (COD)</option>
                                    <option value="Operation">Operation</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Sales">Sales</option>
                                    <option value="R&D">Research and Development (R&D)</option>	
                                    <option value="Team Momentum">Team Momentum</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a department.
                                </div>
                            </div>

                            <label for="unit" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Unit</label>
                            <div class="col-sm-8 col-md-4 mb-3">
                                <input type="text" class="form-control" name="unit" style="text-transform:capitalize; font-size: 10pt" placeholder="Department Unit"/>
                            </div>
                        </div>

                        <div class="row">
                        <label for="description" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Vehicle Description</label>
                            <div class="col-sm-8 col-md-10 mb-3">
                                <textarea rows="4" class="form-control" name="description" style="font-size: 10pt" placeholde="Brand, Type, Color, Specific Features, etc..."></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3 align-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="valid" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        <small>Yes, all the information above is correct. <span class="text-danger">*</span></small>
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Cancel</a>
                                <button type="submit" class="btn btn-dark btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>  

    <script>
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>

@endsection