<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Naslov --}}
    <title>{{ config('app.name', 'answerfinder') }}</title>

    {{-- SASS/CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <main class="container mx-auto max-w-main bg-red-400 p-4">

        {{ $slot }}

    </main>
</body>
</html>