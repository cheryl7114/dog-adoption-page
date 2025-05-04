<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('navbar')

        <div class="flex">
            <!-- Admin Sidebar -->
            <div class="hidden md:block w-64 bg-white shadow-md">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-700">Admin Panel</h2>
                </div>
                <nav class="mt-6">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-700 {{ request()->routeIs('admin.dashboard') ? 'bg-orange-100 text-orange-700' : '' }}">
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-700">
                        Adoption Requests
                    </a>
                    <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-700">
                        Users
                    </a>
                </nav>
            </div>
            
            <!-- Main Content -->
            <div class="flex-1 p-6">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>