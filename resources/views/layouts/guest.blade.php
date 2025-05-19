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

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="60" height="60">
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:rgb(0, 153, 255);stop-opacity:1" />
                            <stop offset="50%" style="stop-color:rgb(0, 119, 255);stop-opacity:1" />
                            <stop offset="100%" style="stop-color:rgb(0, 85, 255);stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <polygon points="10,2 2,18 18,18" fill="url(#grad1)" />
                    <text x="6" y="15" font-family="Arial, sans-serif" font-size="10" fill="white" font-weight="bold">F</text>
                </svg>
            </a>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>