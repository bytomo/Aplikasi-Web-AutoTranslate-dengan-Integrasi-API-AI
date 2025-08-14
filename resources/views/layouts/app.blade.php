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

    <!-- 🎯 Orbs Background -->
    <div class="fx-orbs" aria-hidden="true">
        <span style="--x:8%;--y:18%;--s:36vmin;--h:210;--a:18s;"></span>
        <span style="--x:72%;--y:12%;--s:28vmin;--h:330;--a:22s;"></span>
        <span style="--x:22%;--y:72%;--s:42vmin;--h:270;--a:26s;"></span>
        <span style="--x:84%;--y:68%;--s:30vmin;--h:150;--a:20s;"></span>
    </div>

    <div class="min-h-screen relative z-10">
        @include('layouts.navigation')

        @isset($header)
            <header class="fx-card fx-hover">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
