
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
            @if(!isset(Auth::guard('carDetails')->user()->noplate))

                @yield('firstCreate')
                @yield('login')

            @elseif(isset(Auth::guard('carDetails')->user()->noplate))

                @yield('search')
                
            @endif
            </div>
        </div>
    </body>
</html>
