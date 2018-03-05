<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"  @if(app()->getLocale() == 'ar') dir="rtl" class="translated-ltr" @endif>
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
<!-- Top navbar -->
@include('layouts.top')
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- left Menu -->
    @include('layouts.left')
    <!-- /left Menu -->
        <!-- Main content -->
        <div class="content-wrapper" id="data">
            <span class="hidden" id="url">{{ $url  }}</span>
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
