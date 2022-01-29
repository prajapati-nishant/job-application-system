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
<main class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
    <div class="flex items-start justify-between">
        @include('layouts.backend.partials.sidebar')
        <div class="flex flex-col w-full pl-0 md:p-4 md:space-y-4">
            @include('layouts.backend.partials.navbar')
            <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 main-container">
                <div class="flex flex-col" style="min-height: 80vh;">
                    @yield('content')
                    {{ $slot ?? '' }}
                </div>
                <div class="flex-flex-col my-5">
                    <p class="small text-right mt-5 p-3 text-black d-block">
                        Made with <i class="fa fa-heart animated heartBeat infinite" style="color: red;" aria-hidden="true"></i> &amp; <i
                            class="fa fa-coffee" style="color:black;" aria-hidden="true"></i> by
                        Nishant Prajapati
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
@livewireScripts
<script src="{{ asset('js/util.js') }}"></script>
@stack('js')
</body>
</html>
