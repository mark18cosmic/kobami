<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>{{ config('app.name', 'Kobami') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased min-h-screen flex flex-col items-center justify-center">
    <header class="flex items-center space-x-4">
        <a href="/" aria-label="Kobami Home" class="flex items-center space-x-3 w-40">
            <x-application-logo class="object-contain w-16" />
            <!-- <span class="text-3xl font-semibold tracking-wide text-[#022954]">Kobami</span> -->
        </a>
    </header>
    
    <main class="w-full max-w-lg bg-white rounded-lg shadow-lg p-8 sm:p-10">
        {{ $slot }}
    </main>
    
    <footer class="mt-12 text-center text-[#022954] text-sm font-light">
        &copy; {{ date('Y') }} Kobami. All rights reserved.
    </footer>
</body>
</html>