<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/pisa.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <div class="vr"></div>

                    <ul class="navbar-nav me-auto">

                        <div class="m-2">
                            <select class="form-select form-select" aria-label=".form-select-lg example">
                                <option selected>Protecnica Ingenieria</option>
                                <option value="1">Nutresol</option>
                                <option value="2">Quimica Lider</option>
                            </select>
                        </div>

                        <div class="vr"></div>

                        <div class="search m-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('images/pisa.png') }}" alt="" srcset="">
                                </span>

                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Buscar colaborador, visitante ...">

                                <datalist id="datalistOptions">
                                    <option value="Daniel Muelas - 1144097956">
                                </datalist>

                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            <nav>
                <div class="item-menu">
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
</body>

</html>