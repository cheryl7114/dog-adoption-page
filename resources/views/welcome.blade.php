@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="min-h-[70vh] flex flex-col justify-center items-center px-4 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('../images/dog_background.jpg'); filter: brightness(0.9) contrast(1.1)"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-yellow-50/70 to-orange-50/70"></div>

        <!-- Content -->
        <div class="relative z-10">
            <h1 class="text-5xl md:text-6xl font-extrabold text-orange-600 mb-4">🐶 Adogtion</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-xl text-gray-700">
                Welcome to Adogtion — where tails wag and hearts connect. Your new best friend is just a few clicks away!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/dogs" class="bg-orange-500 text-white px-8 py-3 rounded-lg text-lg font-medium hover:bg-orange-600 transition shadow-md">
                    Find Your Perfect Match
                </a>
                <a href="/how-it-works" class="text-orange-600 border-2 border-orange-500 px-8 py-3 rounded-lg text-lg font-medium hover:bg-orange-100 transition shadow-md">
                    How It Works
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Dogs Section -->
    <section class="py-16 px-4 bg-white mt-10">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Meet Some of Our Friends <span class="text-orange-500">Looking for Homes</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredDogs as $dog)
                <div class="bg-yellow-50 rounded-xl overflow-hidden shadow-lg transition hover:shadow-xl hover:-translate-y-1">
                    <div class="h-64 overflow-hidden">
                        <img src="{{ asset($dog->image_path) }}" alt="{{ $dog->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800">{{ $dog->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $dog->breed }} • {{ $dog->age }} {{ $dog->age == 1 ? 'year' : 'years' }} • {{ ucfirst($dog->sex) }}</p>
                        <a href="/dogs/{{ $dog->id }}" class="text-orange-500 font-medium hover:text-orange-600 flex items-center">
                            Meet {{ $dog->name }} >
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-600">No dogs are currently available for adoption.</p>
                    <a href="/contact" class="inline-block mt-4 bg-orange-500 text-white px-6 py-2 rounded-lg">Contact Us</a>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-10">
                <a href="/dogs" class="inline-flex items-center text-orange-500 font-bold hover:text-orange-600">
                    See all available dogs
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Adopt Section -->
    <section class="py-16 px-4 bg-orange-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Why <span class="text-orange-500">Adopt?</span></h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-orange-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Save a Life</h3>
                    <p class="text-gray-600">When you adopt, you're giving a deserving dog a second chance at a happy life.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-orange-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Find Your Companion</h3>
                    <p class="text-gray-600">Dogs provide unconditional love and companionship that enriches your life.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-orange-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a4 4 0 112.76 3.77" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Combat Puppy Mills</h3>
                    <p class="text-gray-600">Adoption helps reduce demand for puppies from cruel commercial breeding operations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-16 px-4 bg-white mb-20">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Success <span class="text-orange-500">Stories</span></h2>

            <div class="bg-orange-50 rounded-xl p-8 shadow-md">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="w-full md:w-1/3">
                        <img src="https://placedog.net/400/400?id=20" alt="Happy dog with owner" class="rounded-full w-48 h-48 object-cover mx-auto border-4 border-white shadow-lg">
                    </div>
                    <div class="w-full md:w-2/3">
                        <svg class="h-10 w-10 text-orange-300 mb-4" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                        <p class="text-lg mb-6 text-gray-700">We adopted Max last year and it was the best decision we ever made. He's brought so much joy into our lives. The adoption process was smooth and the staff at Adogtion were incredibly helpful throughout.</p>
                        <div>
                            <h4 class="font-bold text-gray-900">Sarah & Tom Williams</h4>
                            <p class="text-gray-600">Adopted Max in 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection