<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($title))
        <title>{{$title}}</title>
    @else
        <title>Meet Mate APP</title>
    @endif

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('lib/noty.css')}}" rel="stylesheet">
    <script src="{{asset('lib/noty.js')}}" type="text/javascript"></script>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/hover_icon.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    @yield('styles')
    @yield('scripts_header')
</head>
<body>

@yield('General')

</body>
</html>