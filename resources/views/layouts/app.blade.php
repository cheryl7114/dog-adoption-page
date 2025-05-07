<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Adogtion') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-yellow-50 text-gray-800 font-sans">
    @include('layouts.navbar')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
    @stack('scripts')
</body>
</html>
