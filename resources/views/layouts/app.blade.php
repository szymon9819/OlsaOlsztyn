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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <ul class="navbar-nav list-inline px-3">
            @auth
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('logout') }}">Admin Panel</a>
                </li>
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 pt-3 px-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>
</body>
</html>
