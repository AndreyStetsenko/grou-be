<!DOCTYPE html>

@php
// confiData variable layoutClasses array in Helper.php file.
  $configData = Helper::applClasses();
@endphp

<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/ico/favicon.ico')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('mainSite/css/style.css')}}">
  </head>

  <body>
    
    @yield('content')

    @include('panels.scripts')
  </body>
</html>
