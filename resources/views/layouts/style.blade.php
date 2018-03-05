<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

@if(app()->getLocale() == 'fr')
    <link href="{{asset('css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/colors.css')}}" rel="stylesheet" type="text/css">
@else
    <link href="{{asset('css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/RTL/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/RTL/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/RTL/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/RTL/colors.css')}}" rel="stylesheet" type="text/css">
@endif
<link href="{{asset('css/layouts.css')}}" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" charset="UTF-8"
      href="https://translate.googleapis.com/translate_static/css/translateelement.css">
<!-- /global stylesheets -->
