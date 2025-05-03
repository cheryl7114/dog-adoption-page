<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dog->name }} - Adogtion</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-yellow-50 text-gray-800 font-sans">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-orange-500 to-amber-500 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <span class="text-2xl font-bold text-white mr-1">🐶</span>
                    <span class="text-2xl font-extrabold text-white">Adogtion</span>
                </a>
            </div>
            
            <!-- Desktop menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">Home</a>
                <a href="/dogs" class="text-white bg-orange-600 px-3 py-2 rounded-md font-medium">Available Dogs</a>
                <a href="/about" class="text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">About Us</a>
                <a href="/contact" class="text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">Contact</a>
                <a href="/donate" class="bg-white text-orange-600 hover:bg-yellow-100 px-4 py-2 rounded-md font-bold">Donate</a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="flex md:hidden items-center">
                <button id="mobile-menu-button" class="text-white hover:bg-orange-600 p-2 rounded-md focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu panel -->
    <div id="mobile-menu" class="hidden md:hidden bg-orange-400">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="text-white block px-3 py-2 rounded-md font-medium hover:bg-orange-600">Home</a>
            <a href="/dogs" class="text-white bg-orange-600 block px-3 py-2 rounded-md font-medium">Available Dogs</a>
            <a href="/about" class="text-white block px-3 py-2 rounded-md font-medium hover:bg-orange-600">About Us</a>
            <a href="/contact" class="text-white block px-3 py-2 rounded-md font-medium hover:bg-orange-600">Contact</a>
            <a href="/donate" class="bg-white text-orange-600 block px-3 py-2 rounded-md font-bold hover:bg-yellow-100">Donate</a>
        </div>
    </div>
</nav>

<!-- Breadcrumbs -->
<div class="bg-orange-100 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-2 text-sm">
            <a href="/" class="text-orange-600 hover:text-orange-700">Home</a>
            <span class="text-gray-500">/</span>
            <a href="/dogs" class="text-orange-600 hover:text-orange-700">Available Dogs</a>
            <span class="text-gray-500">/</span>
            <span class="text-gray-600 font-medium">{{ $dog->name }}</span>
        </div>
    </div>
</div>

<!-- Dog Details -->
<section class="py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Dog Image -->
            <div>
                <div class="bg-white p-4 rounded-xl shadow-md">
                    <img src="{{ asset($dog->image_path) }}" alt="{{ $dog->name }}" class="w-full h-auto rounded-lg object-cover aspect-square">
                </div>
            </div>
            
            <!-- Dog Info -->
            <div>
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $dog->name }}</h1>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-orange-100 text-orange-800 text-sm font-medium px-3 py-1 rounded-full">{{ ucfirst($dog->size) }}</span>
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">{{ ucfirst($dog->sex) }}</span>
                        <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">{{ $dog->age }} {{ $dog->age == 1 ? 'year old' : 'years old' }}</span>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Breed</h2>
                            <p class="text-gray-600">{{ $dog->breed }}</p>
                        </div>
                        
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">About {{ $dog->name }}</h2>
                            <p class="text-gray-600">{{ $dog->description }}</p>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Interested in adopting {{ $dog->name }}?</h2>
                            <a href="/adoption-request/{{ $dog->id }}" class="inline-block bg-orange-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-orange-600 transition">Submit Adoption Request</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Dogs Section -->
<section class="py-16 px-4 bg-orange-50">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">You May Also <span class="text-orange-500">Like</span></h2>
        
        <!-- To be implemented: Show other dogs with similar attributes -->
        <p class="text-center text-gray-600">Check out our other amazing dogs looking for their forever homes!</p>
        <div class="text-center mt-8">
            <a href="/dogs" class="inline-block bg-orange-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-orange-600 transition">
                View All Available Dogs
            </a>
        </div>
    </div>
</section>

@include('footer')

<!-- JavaScript for mobile menu toggle -->
<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>

</body>
</html>