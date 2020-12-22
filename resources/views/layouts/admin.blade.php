<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/uploadfile.min.css" integrity="sha512-MudWpfaBG6v3qaF+T8kMjKJ1Qg8ZMzoPsT5yWujVfvIgYo2xgT1CvZq+r3Ks2kiUKcpo6/EUMyIUhb3ay9lG7A==" crossorigin="anonymous" />

</head>
<body class="bg-color">
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

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

{{--jquery-file-upload--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/jquery.uploadfile.min.js" integrity="sha512-uwNlWrX8+f31dKuSezJIHdwlROJWNkP6URRf+FSWkxSgrGRuiAreWzJLA2IpyRH9lN2H67IP5H4CxBcAshYGNw==" crossorigin="anonymous"></script>


<script src="{{ asset('js/quillEditor.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
