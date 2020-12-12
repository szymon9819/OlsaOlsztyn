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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @stack('css')
</head>
<body>
<div id="app" class="bg-color height-full">

    @include('topnavbar')


    <div class="container-fluid pt-3">
        <div class="row">
            @auth
            @include('admin.sidenavbar')
            @endauth
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border-0 bg-dark text-white">
                            <main role="main" class="pt-3 px-4">
                                @yield('content')
                            </main>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@yield('footer')
@stack('scrpits')
</body>
</html>
