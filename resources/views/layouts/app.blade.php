
@if(isset(Auth::guard('carDetails')->user()->refer_id))

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- icon top -->
        <link rel="icon" type="image/png" href="{{ asset('/img/icon2.png') }}" sizes="16x16">
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
        <!-- icon fas fa -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <!-- icon bi -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

        <style>
          .nav-pills .nav-link.active, .nav-pills .nav-link.active:hover,.nav-pills .nav-link.active:focus{
            background-color:#810000;
            color:white;
            font-weight:550;

            }
        </style>
</head>

  <body>
    <div id="bgcolor"> 
      <nav class="navbar shadow" style="height: 50px">
      <div class="container">
        <a class="navbar-brand" href="{{ url('search') }}/{{ $refer_id }}">
          <img src="{{ asset('/img/icon2.png') }}" width="30"><span style="color: black;"> FindOwner </span>
        </a>
       
        <ul class="nav justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="text-transform:capitalize; color: black;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{ Auth::guard('carDetails')->user()->staffname }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('profile') }}/{{ Auth::guard('carDetails')->user()->refer_id }}"><i class="bi bi-person-fill"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ url('logout') }}" 
                  onclick="event.preventDefault(); 
                  document.getElementById('logout-form').submit();">
                  <i class="bi bi-door-open-fill"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

      <div class="container-fluid center">
        @yield('content')
      </div>
      
    </div>
  </body>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>

@else
  <script>
    location.replace("{{ url('/') }}");
  </script>   
  
@endif