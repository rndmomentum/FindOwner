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
            <li class="breadcrumb-item"><a href="{{ url('search') }}/{{ $refer_id }}" style="color: black">Search</a></li>
            <li class="breadcrumb-item"><a href="{{ url('carlist') }}/{{ $refer_id }}" style="color: black">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Profile</a></li>
        </ol>
    </nav></small>

    <div class="row">
        
        <div class="col-md-2">
            <div class="card shadow-lg mt-3 mb-4">
                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                    <a class="nav-link" id="v-pills-vehicle-tab" data-toggle="pill" href="#v-pills-vehicle" role="tab" aria-controls="v-pills-vehicle" aria-selected="false">Vehicle</a>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- profile -->
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card shadow-lg mt-3">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <div class="mb-3" style="background-color: #810000; color:white; padding: 10px 30px 10px; text-align: center">
                                        <h5> User Detail </h5>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <form method="post" action="{{ url('edit/profile') }}/{{ $refer_id }}" class="needs-validation" novalidate>
                                        @csrf
                                        <div class="col-md-12">

                                            <div class="row">
                                                <label for="name" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Team Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-md-10 mb-2">
                                                    <input type="text" class="form-control" name="staffname" id="validationCustom01" value="{{ $car->staffname }}" style="text-transform:capitalize; font-size: 10pt" placeholder="Full Name" required/>
                                                    <div class="invalid-feedback">
                                                        Please provide a full name.
                                                    </div>
                                                </div>
                                            </div>    

                                            <div class="row">
                                                <label for="name" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">IC Number<span class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-md-4 mb-2">
                                                    <input type="text" class="form-control" name="ic" id="validationCustom02" value="{{ $car->ic }}" style="font-size: 10pt" placeholder="IC Number (Nospace-eg: 999999009999" pattern="[0-9]+" required/>
                                                    <div class="invalid-feedback">
                                                        Please provide a IC number.
                                                    </div>
                                                </div>

                                                <label for="nophone" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Phone No.<span class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-md-4 mb-2">
                                                    <input type="text" class="form-control" name="nophone" id="validationCustom03" value="{{ $car->nophone }}" style="font-size: 10pt" placeholder="Phone Number (Nospace-eg: 0100000000)" pattern="[0-9]+" required/>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid phone number.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="department" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Department<span class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-md-4 mb-2">
                                                    <select class="form-select" name="department" id="validationCustom04" style="font-size: 10pt" required>
                                                        <option value="A&F" {{ $car->department == 'A&F' ? 'selected' : '' }} >Account & Finance (A&F)</option>
                                                        <option value="HR" {{ $car->department == 'HR' ? 'selected' : '' }} >Admin & HR (HR)</option>
                                                        <option value="CEO Office" {{ $car->department == 'CEO Office' ? 'selected' : '' }} >CEO Office</option>
                                                        <option value="HNC" {{ $car->department == 'HNC' ? 'selected' : '' }} >High Network Client (HNC)</option>
                                                        <option value="Marketing" {{ $car->department == 'Marketing' ? 'selected' : '' }} >Marketing</option>
                                                        <option value="Operation" {{ $car->department == 'Operation' ? 'selected' : '' }} >Operation</option>
                                                        <option value="R&D" {{ $car->department == 'R&D' ? 'selected' : '' }} >Research and Development (R&D)</option>
                                                        <option value="Sales" {{ $car->department == 'Sales' ? 'selected' : '' }} >Sales</option>
                                                        <option value="SLT" {{ $car->department == 'SLT' ? 'selected' : '' }} >Senior Leader Team (SLT)</option>
                                                        <option value="Team Momentum" {{ $car->department == 'Team Momentum' ? 'selected' : '' }} >Team Momentum</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a department.
                                                    </div>
                                                </div>

                                                <label for="unit" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Unit</label>
                                                <div class="col-sm-8 col-md-4 mb-3">
                                                    <input type="text" class="form-control" name="unit" value="{{ $car->unit }}" style="text-transform:capitalize; font-size: 10pt" placeholder="Department Unit"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-dark">Submit</button>
                                                </div>
                                            </div>
                                        
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> 
                        <!-- profile password -->
                    <div class="card shadow-lg mt-3 mb-4 pd-4">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <div class="mb-3" style="background-color: #810000; color:white; padding: 10px 30px 10px; text-align: center">
                                        <h5> Change Password </h5>
                                    </div>
                                </div>
                                
                                <div class="container">
                                <div class="col-12">
                                    <form method="post" action="{{ url('edit/password') }}/{{ $refer_id }}" class="needs-validation justify-content-center" novalidate>
                                        @csrf

                                        <div class="col-md-12">
                                            <div class="row justify-content-center form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                <label for="current-password" class="col-form-label col-md-2" style="font-size: 10pt">Current Password</label>
                                                <div class="col-md-4 mb-2">
                                                    <input type="password" class="form-control" name="current-password" id="current-password" style="font-size: 10pt" placeholder="Please Enter Your Old Password" required/>
                                                    
                                                    @if ($errors->has('current-password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('current-password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row justify-content-center form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                <label for="new-password" class="col-form-label col-md-2" style="font-size: 10pt">New Password</label>
                                                <div class="col-md-4 mb-2">
                                                    <input type="password" class="form-control" name="new-password" id="new-password" style="font-size: 10pt" placeholder="Please Enter Your New Password" required/>
                                                    
                                                    @if ($errors->has('new-password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('new-password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row justify-content-center mb-3">
                                                <label for="new-password-confirm" class="col-form-label col-md-2" style="font-size: 10pt">Confirm New Password</label>
                                                <div class="col-md-4 mb-3">
                                                    <input type="password" class="form-control" name="new-password_confirmation" id="new-password_confirmation" style="font-size: 10pt" placeholder="Please Confirm Your New Password" required/>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="form-group">
                                            <div class="col-md-12 text-end">
                                                <button type="submit" class="btn btn-dark">
                                                    Change Password
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- end profile -->

                <!-- vehicle -->
                <div class="tab-pane fade" id="v-pills-vehicle" role="tabpanel" aria-labelledby="v-pills-vehicle-tab">
                @foreach($lists as $data)
                    <form method="post" action="{{ url('edit/vehicle') }}/{{ $refer_id }}/{{ $data->noplate }}" class="needs-validation" enctype="multipart/form-data"  novalidate>
                        @csrf
                        <div class="card shadow-lg mt-3 mb-4">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <div class="mb-3" style="background-color: #810000; color:white; padding: 10px 30px 10px; text-align: center">
                                            <h5 style="text-transform: uppercase">{{ $data->noplate }}</h5>
                                        </div>
                                    </div>

                                    @if($data->img_path == '')
                                        <div class="col-md-12">
                                            <div class="row">
                                                <label for="type" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Type<span class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-md-4 mb-2">
                                                    <select class="form-select" name="type" id="validationCustom05" style="font-size: 10pt" required>
                                                        <option value="Car" {{ $data->type == 'Car' ? 'selected' : '' }} >Car</option>
                                                        <option value="Motorcycle" {{ $data->type == 'Motorcycle' ? 'selected' : '' }} >Motorcycle</option>
                                                        <option value="Van" {{ $data->type == 'Van' ? 'selected' : '' }} >Van</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a vehicle type.
                                                    </div>
                                                </div>

                                                <label for="plate" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Plate No.<span class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-md-4 mb-2">
                                                    <input type="text" class="form-control" name="noplate" id="validationCustom06" value="{{ $data->noplate }}" style="font-size: 10pt" placeholder="Plate Number (Nospace-eg:XXX0000)" pattern="^[-a-zA-Z0-9@\.+_]+$" title="Please remove space between characters" minlength="4" required/>
                                                    <div class="invalid-feedback">
                                                        Please provide a plate number(Make sure no space).
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="img_path" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Vehicle Image (Optional)</label>
                                                <div class="col-sm-8 col-md-10 mb-2">
                                                    <input type="file" class="form-control" name="img_path" style="font-size: 10pt" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="description" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Vehicle Description<span class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-md-10 mb-3">
                                                    <textarea rows="4" class="form-control" name="description" id="validationTextarea" style="font-size: 10pt" placeholder="Brand, Model, Color, Specific Features, etc..." required>{{ $data->description }}</textarea>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide a vehicle's brand, model, features, etc.
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-dark">Submits</button>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-4 text-center mb-3">
                                                <img src="{{ asset($data->img_path) }}" style="max-width:80%" class="img-fluid">
                                            </div>

                                            <div class="col-md-8">
                                                <div class="row">
                                                    <label for="type" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Type<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-md-4 mb-2">
                                                        <select class="form-select" name="type" id="validationCustom04" style="font-size: 10pt" required>
                                                            <option value="Car" {{ $data->type == 'Car' ? 'selected' : '' }} >Car</option>
                                                            <option value="Motorcycle" {{ $data->type == 'Motorcycle' ? 'selected' : '' }} >Motorcycle</option>
                                                            <option value="Van" {{ $data->type == 'Van' ? 'selected' : '' }} >Van</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a vehicle type.
                                                        </div>
                                                    </div>

                                                    <label for="plate" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Plate No.<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-md-4 mb-2">
                                                        <input type="text" class="form-control" name="noplate" id="validationCustom05" value="{{ $data->noplate }}" style="font-size: 10pt" placeholder="Plate Number (Nospace-eg:XXX0000)" pattern="^[-a-zA-Z0-9@\.+_]+$" title="Please remove space between characters" minlength="4" required/>
                                                        <div class="invalid-feedback">
                                                            Please provide a plate number(Make sure no space).
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="img_path" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Vehicle Image (Optional)</label>
                                                    <div class="col-sm-8 col-md-10 mb-2">
                                                        <input type="file" class="form-control" name="img_path" style="font-size: 10pt" />
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="description" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Vehicle Description<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-md-10 mb-3">
                                                        <textarea rows="4" class="form-control" name="description" id="validationTextarea" style="font-size: 10pt" placeholder="Brand, Model, Color, Specific Features, etc..." required>{{ $data->description }}</textarea>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please provide a vehicle's brand, model, features, etc.
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 text-end">
                                                        <button type="submit" class="btn btn-dark">Submit</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
                <!-- end vehicle -->

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

        $(document).ready(function () {
            $('#v-pills-tab a[href="#{{ old('pill') }}"]').tab('show')
        });
    </script>

@endsection