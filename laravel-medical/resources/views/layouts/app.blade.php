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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/ico.png') }}">
    <!-- style -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- script --> 
    <script href="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body class="bg-info">
    <div id="app">
        @auth
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">


                <a class="navbar-brand w-100" href="#">
                    <img src="{{ asset('img/logoNegro.png') }}" alt="" style="max-width: 200px">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto w-100">
                        <!-- Authentication Links -->

                            <li class="nav-item">
                                <a class="btn btn-danger float-right" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        
                    </ul>
                </div>
                
            </div>
        </nav>
        @endauth

        <main class="py-4">
            <div class="container">
                <div class="container-fluid">
                     @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
