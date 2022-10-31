<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Slick slider -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

        <!-- Favicon.ico bug -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">



        <!-- Livewire styles -->
        @livewireStyles


    </head>
    <body class="font-sans antialiased text-gray-900 text-sm">

        <header class="mb-5">
            <x-navbar />
        </header>

        <div class="lg:mx-5 background-cover-image pb-12">
            
            
    
            <main class="container mx-auto max-w-main">
                {{ $slot }}
            </main>
        </div>

        <x-footer />

        <!-- Jquery -->
        <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>

        <!-- Slick slider -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Livewire scripts -->
        @livewireScripts
    </body>
</html>
