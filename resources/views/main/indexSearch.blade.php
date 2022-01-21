@if(isset(Auth::guard('carDetails')->user()->refer_id))

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
                        <h5 class="text-center" style="padding: 10px 0px 10px; background-color: #810000; color:white">FindOwner</h5>
                    
                        <div class="card-body">
                            <div class="col-12 mb-4"><h5 class="text-center"><strong>Search Vehicle Owner</strong></h5></div>

                            <div class="col-md-12">
                                <center><img src=" {{ asset('img/logo.png') }}  " style="width: 180px" class="img-fluid" /></center>
                                <center><p style="font-family: 'Helvetica'">Empower Your Success</p></center>
                            </div>
                            <div class="col-md-12">
                                <form method="GET" action="{{ url('result') }}/{{ $refer_id }}" class="needs-validation" novalidate>
                                    <div class="d-grid mx-auto col-11 pb-3">
                                        <input style="font-size: 10pt" type="text" placeholder="Insert Plate Number (No Space)" id="validationCustom00" class="form-control" pattern="^[-a-zA-Z0-9@\.+_]+$" title="Please remove space between characters" name="noplate" required
                                            autofocus />
                                        <div class="invalid-feedback">
                                            Please remove space.
                                        </div>
                                    </div>
                                    <div class="d-grid mx-auto col-11 pb-1">
                                        <button type="submit" class="btn btn-dark btn-block btn-sm  ">Search</button>
                                    </div>
                                </form>
                                <center><div class="row "><small> 
                                    Click here to view all vehicle <a href="{{ url('carlist') }}/{{ $refer_id }}"> Click Here</a>
                                </small></div></center>
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
  <script>
    location.replace("{{ url('/') }}");
  </script>   
  
@endif