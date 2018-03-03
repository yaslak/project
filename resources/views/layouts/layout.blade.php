<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
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
        <!-- progress bar -->

            <div id="progress">
                <div id="wrap-progress"></div>
                <div id="progress-bar">
                    <div class="pace-demo" style="padding: 30px">
                        <div class="theme_xbox_xs theme_xbox_with_text">
                            <div class="pace_progress" data-progress-text="60%" data-progress="60"></div>
                            <div class="pace_activity"></div>
                        </div>
                    </div>
                </div>
            </div>
<!-- /progress bar -->
    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

@include('layouts.bottom')

</body>

</html>
