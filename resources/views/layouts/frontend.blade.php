<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">

    <link href="{{ asset('vendor/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


    @livewireStyles
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

    @stack('css')
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
</head>
<body>

@include('layouts.frontend.partials.header')

@yield('content')

@include('layouts.frontend.partials.footer')


<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-validate/jquery.validate.min.js') }}"></script>

<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
@livewireScripts
<script src="{{ asset('js/util.js') }}"></script>
@stack('js')
</body>
</html>
