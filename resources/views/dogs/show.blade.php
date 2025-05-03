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
@include('navbar')

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
<section class="py-16 px-14 bg-orange-100">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">You May Also <span class="text-orange-500">Like</span></h2>
        @if($otherDogs->count())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                @foreach($otherDogs as $other)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <a href="{{ url('/dogs/'.$other->id) }}">
                            <img src="{{ asset($other->image_path) }}" alt="{{ $other->name }}" class="w-full h-56 object-cover">
                        </a>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $other->name }}</h3>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ ucfirst($other->size) }}</span>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ ucfirst($other->sex) }}</span>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $other->age }} {{ $other->age == 1 ? 'year' : 'years' }}</span>
                            </div>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit($other->description, 60) }}</p>
                            <a href="{{ url('/dogs/'.$other->id) }}" class="inline-block bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-orange-600 transition">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600 mb-8">Check out our other amazing dogs looking for their forever homes!</p>
        @endif
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