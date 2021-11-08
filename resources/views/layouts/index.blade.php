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
            padding-top: 100px;
            padding-bottom: 100px;
            padding-right: 15%;
            padding-left: 14%;
          }
        </style>
    </head>

    <body>
        <div id="searchblock">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow-lg mx-auto">
                        <h5 class="text-center" style="padding: 10px 0px 10px; background-color: #810000; color:white">FindOwner - Find Me Now!</h5>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="img/icon2.png" style="width: 150px" class="img-fluid col-md-4" /><br>
                                    <strong style="font-family: 'Helvetica';">Momentum Internet Sdn Bhd</strong>
                                </div>
                                <div class="col-md-12 pt-4 mb-3">
                                    <div class="d-grid mx-auto col-md-8">
                                        <a href="{{ route('FindMeNow/search') }}" class="btn btn-dark btn-block btn-md">Search Owner</a>
                                    </div><br>
                                    <div class="d-grid mx-auto col-md-8">
                                        <a href="{{ route('FindMeNow/create') }}" class="btn btn-dark btn-block btn-md" >Add New Vehicle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
        