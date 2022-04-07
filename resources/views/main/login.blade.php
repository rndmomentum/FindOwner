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
            padding-top: 45px;
            padding-bottom: 45px;
          }
        </style>
    </head>

    <body>
        <div id="searchblock">
            <div class="row justify-content-center">

                <div class="col-md-5 p-4">
                    <div class="card shadow-lg">
                        <h5 class="text-center" style="padding: 10px 0px 10px; background-color: #810000; color:white">Log In</h5>

                        <div class="card-body">

                            <div class="col-md-12 mb-3 text-center">
                                <img src="img/icon2.png" style="width: 150px" class="img-fluid col-md-4" /><br>
                                <strong style="font-family: 'Helvetica';">FindOwner - Momentum Internet Sdn Bhd</strong>
                            </div>

                            <div class="col-md-12">
                                <form method="POST" action="{{ url('loginProcess') }}" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="d-grid mx-auto col-11 pb-3">
                                        <input style="font-size: 10pt" type="text" placeholder="Insert IC Number (No Space)" id="validationCustom00" class="form-control" pattern="^[-a-zA-Z0-9@\.+_]+$" name="ic" required autofocus />
                                        <div class="invalid-feedback">Please remove space between characters.</div>
                                        @if ($errors->has('noplate'))
                                            <span class="text-danger">{{ $error->first('ic') }}</span>
                                        @endif
                                    </div>

                                    <div class="d-grid mx-auto col-11 pb-3">
                                        <input style="font-size: 10pt" type="password" placeholder="Insert Password" id="validationCustom01" class="form-control" name="password" required />
                                        <div class="invalid-feedback">Please insert password.</div>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $error->first('password') }}</span>
                                        @endif

                                        <div class="col-md-12 text-center">
                                            @if(session('error'))
                                                <small style="color: red;">Sorry! {{ session('error') }}</small>
                                            @endif 
                                        </div>
                                    </div>

                                    <div class="d-grid mx-auto col-11 pb-1">
                                        <button type="submit" class="btn btn-dark btn-block btn-sm ">Log In</button>
                                    </div>
                                </form>

                                <div class="row text-end px-4"><small>
                                    Have no account? <a href="{{ url('register') }}" class="btn btn-success btn-sm"> Register</a>
                                </small></div>
                                <br>
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