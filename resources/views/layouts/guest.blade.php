<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <!-- Orbs -->
    <div class="fx-orbs" aria-hidden="true">
        <span style="--x:8%;--y:18%;--s:36vmin;--h:210;--a:18s;"></span>
        <span style="--x:72%;--y:12%;--s:28vmin;--h:330;--a:22s;"></span>
        <span style="--x:22%;--y:72%;--s:42vmin;--h:270;--a:26s;"></span>
        <span style="--x:84%;--y:68%;--s:30vmin;--h:150;--a:20s;"></span>
    </div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-100" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 fx-card fx-hover">
            {{ $slot }}
        </div>
    </div>
</body>
</html>