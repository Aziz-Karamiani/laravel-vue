<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel9-Vue3 - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ asset('assets/bootstrap.min.js')}}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>
<body>
<div id="app" class="container-fluid">
    <index></index>
    @yield('content')
</div>
</body>
</html>
