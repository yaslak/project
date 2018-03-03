<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LY</title>
    @include('layouts.style')
    @include('layouts.js')
</head>
<body>

@include('layouts.top')

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        @include('layouts.left')


        <!-- Main content -->
        <div class="content-wrapper" id="data">

            @yield('content-header')


            <!-- Content area -->
            <div class="content">

                @yield('content-body')

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

@include('layouts.bottom')

</body>

</html>
