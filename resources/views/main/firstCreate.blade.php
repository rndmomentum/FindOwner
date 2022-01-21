@if(!isset(Auth::guard('carDetails')->user()->refer_id))

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- icon top -->
        <link rel="icon" type="image/png" href="img/icon2.png" sizes="16x16">
        <title>FindOwner</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- bootstrap CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
        <!-- bootstrap JS -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js"></script>
        <link href="https://bootswatch.com/lux/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- onchange function -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- icon bi -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

        <style>
          #searchblock {
            padding-top: 8px;
            padding-bottom: 8px;
          }
        </style>
    </head>

    <body>
        <div id="searchblock">
            <div class="row justify-content-center">

                <div class="col-md-11 p-0">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    <small><strong>Sorry!</strong> {{ session('error') }}</small>
                                </div>
                            @endif 
                        </div>
                    </div>
                    
                    <div class="card shadow-lg mt-3 mb-4">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <div class="mb-3" style="background-color: #810000; color:white; padding: 10px 30px 10px; text-align: center">
                                        <h5> Registration </h5>
                                    </div>
                                </div>

                                <form method="post" action="{{ url('/register/save') }}" class="needs-validation" enctype="multipart/form-data"  novalidate>
                                    @csrf

                                    <div class="col-md-12 mb-4 text-center">
                                        <h5>Personal Information</h5>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="row">
                                            <label for="name" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Team Name<span class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-md-4 mb-2">
                                                <input type="text" class="form-control" name="staffname" id="validationCustom03" style="text-transform:capitalize; font-size: 10pt" placeholder="Full Name" required/>
                                                <div class="invalid-feedback">
                                                    Please provide a full name.
                                                </div>
                                            </div>

                                            <label for="nophone" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Phone No.<span class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-md-4 mb-2">
                                                <input type="text" class="form-control" name="nophone" id="validationCustom04" style="font-size: 10pt" placeholder="Phone Number (Nospace-eg: 0100000000)" pattern="[0-9]+" required/>
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone number.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="department" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Department<span class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-md-4 mb-2">
                                                <select class="form-select" name="department" id="validationCustom05" style="font-size: 10pt" required>
                                                    <option value="">Choose Department...</option>
                                                    <option value="A&F">Account & Finance (A&F)</option>
                                                    <option value="HR">Admin & HR (HR)</option>
                                                    <option value="CEO Office">CEO Office</option>
                                                    <option value="Marketing">Marketing</option>
                                                    <option value="Operation">Operation</option>
                                                    <option value="R&D">Research and Development (R&D)</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Team Momentum">Team Momentum</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a department.
                                                </div>
                                            </div>

                                            <label for="unit" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Unit</label>
                                            <div class="col-sm-8 col-md-4 mb-2">
                                                <input type="text" class="form-control" name="unit" style="text-transform:capitalize; font-size: 10pt" placeholder="Department Unit"/>
                                            </div>
                                        </div>
                                    
                                        <div class="row{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Password<span class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-md-4 mb-2">
                                                <input type="password" class="form-control" name="password" id="password" style="font-size: 10pt" placeholder="Password (minimum 8 characters)" required/>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif                                    
                                            </div>

                                            <label for="new-password-confirm" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Confirmation Password<span class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-md-4 mb-2">
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" style="font-size: 10pt" placeholder="Confirmation Password (minimun 8 characters)" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-4 mt-4 text-center">
                                            <h5>Vehicle Information</h5>
                                        </div>

                                        <div class="row">
                                            <label for="type" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Type<span class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-md-4 mb-2">
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

                                            <label for="plate" class="col-sm-4 col-form-label col-md-2" style="font-size: 10pt">Plate No.<span class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-md-4 mb-2">
                                                <input type="text" class="form-control" name="noplate" id="validationCustom02" style="font-size: 10pt" placeholder="Plate Number (Nospace-eg:XXX0000)" pattern="^[-a-zA-Z0-9@\.+_]+$" title="Please remove space between characters" minlength="4" required/>
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
                                            <div class="col-sm-8 col-md-10 mb-2">
                                                <textarea rows="4" class="form-control" name="description" id="validationTextarea" style="font-size: 10pt" placeholder="Brand, Model, Color, Specific Features, etc..." required></textarea>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a vehicle's brand, model, features, etc.
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <a href="{{ url('/') }}" class="btn btn-danger btn-sm">Cancel</a>
                                                <button type="submit" class="btn btn-dark btn-sm">Submit</button>
                                            </div>
                                        </div>
                                    
                                    </div>
                                
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                            
            </div>
        </div>
    </body>
</html>

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

@else
    {{ Session::flush(); }}

    <script>
        location.replace("{{ url('/') }}");
    </script> 
  
@endif