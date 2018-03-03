<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LY</title>

    <!-- Styles -->
    <link href="{{ asset('css/fo/fa-brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fo/fa-regular.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fo/fa-solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fo/fa-svg-with-js.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fo/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fo/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts.css') }}" rel="stylesheet">
</head>
<body style="padding-top: 40px;">
    @include('layouts.top')
    <div class="container-fluid" style="padding-top: 40px;">
         @yield('content')
        @include('layouts.flash')
    </div>

<!-- scripts -->
<script type="text/javascript" src="{{ asset('js/jq.js') }}"></script>
<script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fo/fa-brands.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fo/fa-regular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fo/fa-v4-shims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fo/fontawesome.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fo/fontawesome-all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
