<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">

    
</head>
<body>
    <div id="app">
        <nav class="navegador navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!--@guest-->

                    <!--@else-->

                    <!--@endguest-->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <div class="buscador-productos mr-sm-2">
                        <form class="form-inline my-2 my-lg-0" action="" method="get">
                            <input class="form-control mr-sm-2 buscador-control" type="search" name="producto" value="{{$producto}}" placeholder="Buscar Producto" aria-label="Search">
                        </form>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            <!--@if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif--->
                        @else
                            @if(Auth::user()->cargo == 'Administrador')
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link color-white nav-prin" href="/productos"><span class="icon-nav"><ion-icon name="productos"></ion-icon></span>{{ __('Productos') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link color-white nav-prin" href="/usuarios"><span class="icon-nav"><ion-icon name="people"></ion-icon></span>{{ __('Usuarios') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link color-white nav-prin" href="/cargos"><span class="icon-nav"><ion-icon name="layers"></ion-icon></span>{{ __('Nota') }}</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link color-white nav-prin" href="/home"><span class="icon-nav"><ion-icon name="home"></ion-icon></span>{{ __('Asistencia') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link color-white nav-prin" href="/registro"><span class="icon-nav"><ion-icon name="newspaper"></ion-icon></span>{{ __('Registro') }}</a>
                                    </li>
                                </ul>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('perfil') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('perfil-form').submit();">
                                        {{ __('Perfil') }}
                                    </a>

                                    <form id="perfil-form" action="{{ route('perfil') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
