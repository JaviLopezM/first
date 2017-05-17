<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      {{--Tema predeterminat de bootstrap--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {{-- Opcions propies de CSS --}}
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      <link rel="stylesheet" href="{{asset('css/animate.css')}}">



{{--CDN JQuery per a que funcione algunes opcions de Bootstrap com el desplegable--}}
      <script
              src="https://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous">

      </script>
      <!-- CDN de Bootstrap-->
      <script
              src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
              integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
              crossorigin="anonymous">

      </script>
    <script src="/js/laravel.js"></script>
    <title>Javier López</title>




  </head>

  <body style="padding-left: 20px; margin-bottom: 50px; margin-right: 20px">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#">JaviDAW.com</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="{{url('notes')}}">Notes</a></li>
              @if (!Auth::guest())
            <li><a href="{{url('notes/create')}}">Crear</a></li>
              @endif

          </ul>

          <ul class="nav navbar-nav navbar-right jello">
            @if (Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('auth.create') }}">Registro</a></li>
            @else
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nombre }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class=""><a href="{{ route('perfil') }}">Perfil</a></li>
                    <li><a href="{{url('list')}}">Usuarios</a></li>
                  <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
                  {{--<li><a href="{{ route('logout') }}">Logout</a></li>--}}
            @endif

          </ul>
        </div><!--/.nav-collapse -->
      </div>

    </nav>


    <div class="jumbotron" style="padding-left: 10px">
        <h1>Javier López</h1>
        <br>
        <p>Web creada con Laravel 5.1 LTS y Bootstrap</p>
    </div>
    @yield('cuerpo')
  </body>

</html>
