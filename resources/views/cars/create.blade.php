@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 mt-3">
            @if(session('error'))
                <div class="alert alert-danger">
                    <small><strong>Sorry!</strong> {{ session('error') }}</small>
                </div>
            @endif 
        </div>
    </div>

    <small><nav aria-label="breadcrumb" >
        <ol class="breadcrumb" >
            <li class="breadcrumb-item"><a href="{{ url('carlist') }}/{{ $refer_id }}" style="color: black"><i class="bi bi-arrow-left pl-2 pr-2"></i></a>
            <li class="breadcrumb-item"><a href="{{ url( 'search' ) }}/{{ $refer_id }}" style="color: black">Search</a></li>
            <li class="breadcrumb-item"><a href="{{ url('carlist') }}/{{ $refer_id }}" style="color: black">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Create Detail</a></li>
        </ol>
    </nav></small>

    <div class="card shadow-lg mt-3 mb-4">
        <div class="card-body">
            <div class="row">

                <div class="col-md-12 mb-3">
                    <div class="mb-3" style="background-color: #810000; color:white; padding: 10px 30px 10px; text-align: center">
                        <h5> Create Vehicle Detail </h5>
                    </div>
                </div>
              
                <div class="col-md-12">
                    <form method="post" action="{{ url('store') }}/{{ $refer_id }}" class="needs-validation" enctype="multipart/form-data"  novalidate>
                        @csrf
                        <!-- vehicle -->
                        <div class="col-md-12 mb-4 text-center">
                            <h5>Vehicle Information</h5>
                        </div>
                            
                        <div class="row">
                            <label for="type" class="col-md-2 col-form-label" style="font-size: 10pt">Type<span class="text-danger">*</span></label>
                            <div class="col-md-4 mb-2">
                                <select class="form-select" name="type" id="validationCustom01" style="font-size: 10pt" required>
                                <option value="">Choose Vehicle Type...</option>
                                    <option value="Car">Car</option>
                                    <option value="Motorcycle">Motorcycle</option>
                                    <option value="Van">Van</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a vehicle type.
                                </div>
                            </div>

                            <label for="plate" class="col-md-2 col-form-label" style="font-size: 10pt">Plate No.<span class="text-danger">*</span></label>
                            <div class="col-md-4 mb-2">
                                <input type="text" class="form-control" name="noplate" id="validationCustom02"  style="font-size: 10pt" placeholder="Plate Number (Nospace-eg:XXX0000)" pattern="^[-a-zA-Z0-9@\.+_]+$" title="Please remove space between characters" minlength="4" required/>
                                <div class="invalid-feedback">
                                    Please provide a plate number(Make sure no space).
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="img_path" class="col-md-2 col-form-label" style="font-size: 10pt">Vehicle Image (Optional)</label>
                            <div class="col-md-10 mb-2">
                                <input type="file" class="form-control" name="img_path" style="font-size: 10pt" />
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2 col-form-label" style="font-size: 10pt">Vehicle Description<span class="text-danger">*</span></label>
                                <div class="col-md-4 col-md-10">
                                    <textarea rows="4" class="form-control" name="description" id="validationTextarea" style="font-size: 10pt" placeholder="Brand, Model, Color, Specific Features, etc..." required></textarea>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a vehicle's brand, model, features, etc.
                                </div>
                            </div>
                        </div>
                     <!-- end vehicle -->

                        <div class="row">
                            <div class="col-md-12 text-center mt-4">
                                <a href="{{ url('carlist') }}/{{ $refer_id }}" class="btn btn-danger btn-sm">Cancel</a>
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