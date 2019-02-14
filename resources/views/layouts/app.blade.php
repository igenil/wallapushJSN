<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="{{asset('image/wallapop.png')}}" width="45cm" height="45cm"/>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item px-lg-3">
                    <a class="nav-link" href="{{ url('/anuncios') }}">
                        <b>ANUNCIOS</b>
                    </a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/listCategoriasusuarios') }}">
                        <b>CATEGORIAS</b>
                    </a> 
                </li>
                <li class="nav-item px-lg-5">
                    <a class="nav-link" href="{{ url('/addanuncio') }}">
                        <button type="button" class="btn btn-sm btn-outline-success"><i class="fas fa-plus-circle"></i>  SUBIR PRODUCTO</button>                       
                    </a>
                </li>
              </ul>
              <li class="navbar-nav px-lg-4">
                @if (Auth::check())
                    <span style="color: #b3b6bc;">Saldo: {{ Auth::user()->saldo }} €</span>
                @endif
              </li>
              <ul class="navbar-nav">
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link px-lg-5" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                @if (Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ url('/listusers') }}">Usuarios</a>
                                    <a class="dropdown-item" href="{{ url('/listAnuncios') }}">Anuncios</a>
                                    <a class="dropdown-item" href="{{ url('/listCategorias') }}">Categorias</a>
                                    <a class="dropdown-item" href="{{ url('/ranking') }}">Rankings</a>
                                    <a class="dropdown-item" href="{{ url('/categoriafecha1') }}">Ventas fecha</a>
                                @endif
                              
                                <a class="dropdown-item" href="{{ route('compras')}}">Compras</a>
                                <a class="dropdown-item" href="{{ route('ventas')}}">Ventas</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                </a>
                                <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @endguest
            </ul>
            </div>
          </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
