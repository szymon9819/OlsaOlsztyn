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
    @yield('css')
</head>
<body>
<div id="app">
    @include('topnavbar')

    <div class="container-fluid pt-3">
        <div class="row">
            @include('admin.sidenavbar')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border-0">
                            <main role="main" class="col-md-9 col-lg-10 pt-3 px-4">
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
@yield('scrpits')
</body>
</html>