<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ICA') }}</title>

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylehome.css') }}" rel="stylesheet">
    

    @yield('css')
</head>
<body>
    <div class="container mb-4">
        @include('layouts.menu');
    </div>
    <div class="container" style="margin-top: 80px; margin-bottom: 50px">
        @yield('content')
    </div>
    <div class="container-fluid" style="margin-top: 80px; margin-bottom: 50px">
        @yield('content1')
    </div>

    {{-- <footer id="footer">
        <div>
            <center><p class="my-4">Copyright ICA , (c) 2017 </p></center>
        </div>
    </footer> --}}
    <!-- Scripts -->
    <script src="{{ asset('vendor/bootstrap/assets/js/vendor/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>

    @yield('script')
</body>
</html>