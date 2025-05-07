@extends('layouts.app')

@section('content')
<div class="bg-orange-500 text-white py-16 mb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold mb-4">Find Your Perfect Companion</h1>
        <p class="text-xl max-w-2xl mx-auto">Browse our selection of wonderful dogs looking for their forever homes. Each one has a unique personality and is ready to share their love with you.</p>
    </div>
</div>

<div class="py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row gap-8">
        <!-- Sidebar Filters -->
        <aside class="md:w-1/4 w-full mb-8 md:mb-0">
            <div class="bg-orange-50 rounded-xl shadow-md border border-orange-100 p-6 sticky top-8">
                <form action="/dogs" method="get">
                    <h2 class="text-lg font-bold text-orange-600 mb-4">Filter Dogs</h2>
                    <!-- Breed -->
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2 text-gray-700">Breed</h3>
                        <div class="space-y-1 max-h-40 overflow-y-auto">
                            @foreach($breeds as $breed)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="breed[]" value="{{ $breed }}" {{ collect(request('breed'))->contains($breed) ? 'checked' : '' }}>
                                    <span>{{ $breed }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <!-- Size -->
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2 text-gray-700">Size</h3>
                        <div class="space-y-1">
                            @foreach(['small', 'medium', 'large'] as $size)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="size[]" value="{{ $size }}" {{ collect(request('size'))->contains($size) ? 'checked' : '' }}>
                                    <span class="capitalize">{{ $size }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <!-- Age -->
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2 text-gray-700">Age</h3>
                        <div class="space-y-1">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="age[]" value="puppy" {{ collect(request('age'))->contains('puppy') ? 'checked' : '' }}>
                                <span>Puppy (&lt; 1 year)</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="age[]" value="young" {{ collect(request('age'))->contains('young') ? 'checked' : '' }}>
                                <span>Young (1-3 years)</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="age[]" value="adult" {{ collect(request('age'))->contains('adult') ? 'checked' : '' }}>
                                <span>Adult (4-8 years)</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="age[]" value="senior" {{ collect(request('age'))->contains('senior') ? 'checked' : '' }}>
                                <span>Senior (9+ years)</span>
                            </label>
                        </div>
                    </div>
                    <!-- Sex -->
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2 text-gray-700">Gender</h3>
                        <div class="space-y-1">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="sex[]" value="male" {{ collect(request('sex'))->contains('male') ? 'checked' : '' }}>
                                <span>Male</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="sex[]" value="female" {{ collect(request('sex'))->contains('female') ? 'checked' : '' }}>
                                <span>Female</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-6">
                        <button type="submit" class="flex-1 bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition">
                            Apply
                        </button>
                        <a href="/dogs" class="flex-1 bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition text-center">
                            Clear
                        </a>
                    </div>
                </form>
            </div>
        </aside>
        <!-- Dogs Listing -->
        <main class="md:w-3/4 w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($dogs as $dog)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg transition hover:shadow-xl hover:-translate-y-1 flex flex-col">
                    <div class="h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $dog->image_path) }}" alt="{{ $dog->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $dog->name }}</h3>
                                <p class="text-gray-600">{{ $dog->breed }} • {{ $dog->age }} {{ $dog->age == 1 ? 'year' : 'years' }} • {{ ucfirst($dog->sex) }}</p>
                            </div>
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ ucfirst($dog->size) }}</span>
                        </div>
                        <p class="text-gray-600 my-4 line-clamp-3">{{ $dog->description }}</p>
                        
                        {{-- Button at the bottom --}}
                        <div class="mt-auto pt-4">
                            <a href="/dogs/{{ $dog->id }}" class="inline-block bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition">
                                Meet {{ $dog->name }}
                            </a>
                        </div>
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
        </main>
    </div>
</div>

<!-- Adoption Process -->
<section class="py-20 px-4 bg-gradient-to-br from-orange-50 via-white to-orange-100 rounded-3xl shadow-xl border border-orange-100 mt-20 mb-40">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-16 text-gray-800">
            The <span class="text-orange-500">Adoption Process</span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="text-center">
                <div class="bg-orange-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6 shadow-md border-2 border-orange-200">
                    <span class="text-orange-600 text-3xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Browse Available Dogs</h3>
                <p class="text-gray-600">Look through our listings to find potential matches for your lifestyle.</p>
            </div>
            <div class="text-center">
                <div class="bg-orange-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6 shadow-md border-2 border-orange-200">
                    <span class="text-orange-600 text-3xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Submit Application</h3>
                <p class="text-gray-600">Fill out our adoption application form with your information.</p>
            </div>
            <div class="text-center">
                <div class="bg-orange-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6 shadow-md border-2 border-orange-200">
                    <span class="text-orange-600 text-3xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Meet Your Match</h3>
                <p class="text-gray-600">Schedule a visit to meet the dog and see if you're a good fit for each other.</p>
            </div>
            <div class="text-center">
                <div class="bg-orange-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6 shadow-md border-2 border-orange-200">
                    <span class="text-orange-600 text-3xl font-bold">4</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Welcome Home</h3>
                <p class="text-gray-600">Complete the adoption process and welcome your new friend home!</p>
            </div>
        </div>
    </div>
</section>
@endsection
