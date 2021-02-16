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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>

</head>
<body class="bg-color">
<div id="app" class="bg-color height-full">

    @include('topnavbar')

    <div id="content" class="container-fluid">
        <div class="row">

            @include('admin.sidenavbar')

            <div class="col p-0 justify-content-center">
                    <div class="card border-0 bg-dark rounded-0 text-white">
                        <main role="main" class="pt-3 px-4">
                            <button id="show-sidebar-btn" class="btn btn-lg mb-3" onclick="showSidebar()"><h2 class="text-white">☰</h2></button>
                            @yield('content')
                        </main>
                    </div>
            </div>
        </div>
    </div>

    @yield('footer')

</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

{{--jquery-file-upload--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/jquery.uploadfile.min.js"
        integrity="sha512-uwNlWrX8+f31dKuSezJIHdwlROJWNkP6URRf+FSWkxSgrGRuiAreWzJLA2IpyRH9lN2H67IP5H4CxBcAshYGNw=="
        crossorigin="anonymous"></script>


<script src="{{ asset('js/quillEditor.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
