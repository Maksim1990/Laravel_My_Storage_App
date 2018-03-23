<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <html lang="{{ app()->getLocale() }}">
    @if(isset($title))
        <title>{{$title}}</title>
    @else
        <title>Meet Mate APP</title>
    @endif


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{asset('lib/noty.css')}}" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="{{asset('lib/noty.js')}}" type="text/javascript"></script>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/hover_icon.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/loading_icon_style.css')}}" rel="stylesheet">

@yield('styles')
@yield('scripts_header')


<body>
<div id="app">
    <div id="divLoading"></div>
@include('layouts.header')
@include('layouts.left')
@include('layouts.modals')



<!-- Overlay effect when opening the side navigation on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
         title="Close Sidemenu" id="myOverlay"></div>

    @include('layouts.content')
</div>
@yield('scripts')

@include('layouts.footer')

</body>
</html>
