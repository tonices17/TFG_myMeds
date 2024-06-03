<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mi Sitio Web')</title>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('assets/logo.png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('sass/main.css') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="background">
    <div id="app" class="pagina">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <div class="nav__contenedor">
                    <a class="nav__logo" style="text-decoration: none" href="{{ route('mymeds') }}">
                        <img src="{{ asset('assets/logo.png') }}" alt="pastilla-logo">
                        <span class="nav__logo-letra">myMeds</span>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" style="gap: 2rem">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item nav__lista-item">
                            <a class="nav-link" style="font-size: 2rem; color: white" href="{{ route('login') }}">{{
                                __('Iniciar
                                Sesión')
                                }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item nav__lista-item">
                            <a class="nav-link" style="font-size: 2rem; color: white" href="{{ route('register') }}">{{
                                __('Registrarse')
                                }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="font: 600 2rem nuevaLetra;"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="font-size: 1.5rem" href="{{ route('mymeds') }}">
                                    <i class="fas fa-regular fa-user"></i>
                                    {{ __('Perfil') }}
                                </a>

                                <a class="dropdown-item" style="font-size: 1.5rem" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Salir') }}
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