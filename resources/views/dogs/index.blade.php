<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Dogs - Adogtion</title>
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

<!-- Page Header -->
<div class="bg-orange-500 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold mb-4">Find Your Perfect Companion</h1>
        <p class="text-xl max-w-2xl mx-auto">Browse our selection of wonderful dogs looking for their forever homes. Each one has a unique personality and is ready to share their love with you.</p>
    </div>
</div>

<!-- Filter Section -->
<div class="bg-white py-6 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="/dogs" method="get" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="breed" class="block text-sm font-medium text-gray-700 mb-1">Breed</label>
                <select id="breed" name="breed" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
                    <option value="">All Breeds</option>
                    <!-- Add breed options dynamically in the future -->
                </select>
            </div>
            <div>
                <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Size</label>
                <select id="size" name="size" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
                    <option value="">All Sizes</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
            </div>
            <div>
                <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                <select id="age" name="age" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
                    <option value="">All Ages</option>
                    <option value="puppy">Puppy (< 1 year)</option>
                    <option value="young">Young (1-3 years)</option>
                    <option value="adult">Adult (4-8 years)</option>
                    <option value="senior">Senior (9+ years)</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Dogs Listing -->
<section class="py-16 px-4 bg-yellow-50">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($dogs as $dog)
            <div class="bg-white rounded-xl overflow-hidden shadow-lg transition hover:shadow-xl hover:-translate-y-1">
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset($dog->image_path) }}" alt="{{ $dog->name }}" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $dog->name }}</h3>
                            <p class="text-gray-600">{{ $dog->breed }} • {{ $dog->age }} {{ $dog->age == 1 ? 'year' : 'years' }} • {{ ucfirst($dog->sex) }}</p>
                        </div>
                        <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ ucfirst($dog->size) }}</span>
                    </div>
                    <p class="text-gray-600 my-4 line-clamp-3">{{ $dog->description }}</p>
                    <a href="/dogs/{{ $dog->id }}" class="inline-block bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition">
                        Meet {{ $dog->name }}
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 bg-white rounded-xl shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-orange-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-gray-600 text-xl mb-4">No dogs are currently available for adoption.</p>
                <p class="text-gray-500 mb-6">Please check back later or contact us for more information.</p>
                <a href="/contact" class="inline-block bg-orange-500 text-white px-6 py-3 rounded-lg font-medium">Contact Us</a>
            </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        <div class="mt-12">
            {{ $dogs->links() }}
        </div>
    </div>
</section>

<!-- Adoption Process -->
<section class="py-16 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-16 text-gray-800">The <span class="text-orange-500">Adoption Process</span></h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-orange-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                    <span class="text-orange-600 text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Browse Available Dogs</h3>
                <p class="text-gray-600">Look through our listings to find potential matches for your lifestyle.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-orange-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                    <span class="text-orange-600 text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Submit Application</h3>
                <p class="text-gray-600">Fill out our adoption application form with your information.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-orange-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                    <span class="text-orange-600 text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Meet Your Match</h3>
                <p class="text-gray-600">Schedule a visit to meet the dog and see if you're a good fit for each other.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-orange-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                    <span class="text-orange-600 text-2xl font-bold">4</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Welcome Home</h3>
                <p class="text-gray-600">Complete the adoption process and welcome your new friend home!</p>
            </div>
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