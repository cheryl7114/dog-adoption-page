@extends('layouts.app')

@section('content')
<div class="min-h-[60vh] flex flex-col justify-center items-center px-4 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://images.unsplash.com/photo-1507146426996-ef05306b995a?auto=format&fit=crop&w=1200&q=80'); filter: brightness(0.85) contrast(1.1);"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-yellow-50/70 to-orange-50/70"></div>
    <!-- Content -->
    <div class="relative z-10 flex flex-col items-center justify-center w-full">
        <span class="inline-block py-1 px-4 rounded-full bg-orange-100/90 text-orange-700 font-semibold text-sm mb-6">Our Mission & Story</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-orange-600 mb-4 drop-shadow">About <span class="text-yellow-300">Adogtion</span></h1>
        <p class="text-lg md:text-xl mb-8 max-w-xl text-gray-700 drop-shadow">
            Connecting wonderful dogs with loving families, making adoption simple and joyful for everyone.
        </p>
        <a href="#our-story" class="animate-bounce inline-flex items-center justify-center w-12 h-12 rounded-full bg-orange-500/80 backdrop-blur-sm text-white hover:bg-orange-600/80 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </a>
    </div>
</div>

<!-- Our Story Section -->
<section id="our-story" class="py-20 bg-white relative">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-col md:flex-row gap-16 items-center">
            <!-- Image Column -->
            <div class="md:w-1/2 mb-10 md:mb-0">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 rounded-full bg-orange-100"></div>
                    <div class="absolute -bottom-4 -right-4 w-16 h-16 rounded-full bg-yellow-200"></div>
                    <img src="https://images.unsplash.com/photo-1601758174114-e711c0cbaa69?auto=format&fit=crop&w=600&q=80" 
                         alt="Happy dog with adopter" 
                         class="rounded-2xl shadow-xl relative z-10 w-full h-auto object-cover" />
                </div>
            </div>
            
            <!-- Content Column -->
            <div class="md:w-1/2">
                <span class="inline-block py-1 px-3 rounded-full bg-orange-100 text-orange-600 font-medium text-sm mb-4">Since 2018</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Our Story</h2>
                <p class="text-lg text-gray-700 mb-4 leading-relaxed">
                    Founded by passionate dog lovers, Adogtion started as a small community initiative and has grown into a trusted platform for dog adoption nationwide. 
                </p>
                <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                    We work closely with local shelters and foster homes to help dogs of all breeds and backgrounds find their forever families, while providing support and resources throughout the adoption journey.
                </p>
                <div class="flex flex-wrap gap-8 items-center">
                    <div class="flex items-center gap-2">
                        <span class="text-orange-500 font-bold text-3xl md:text-4xl">3K+</span>
                        <span class="text-gray-600 text-base">Dogs<br>Adopted</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-orange-500 font-bold text-3xl md:text-4xl">200+</span>
                        <span class="text-gray-600 text-base">Shelter<br>Partners</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-orange-500 font-bold text-3xl md:text-4xl">50+</span>
                        <span class="text-gray-600 text-base">Cities<br>Covered</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-orange-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14">
            <span class="inline-block py-1 px-3 rounded-full bg-orange-100 text-orange-600 font-medium text-sm mb-4">What We Stand For</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Our Core Values</h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                These principles guide everything we do at Adogtion, from how we partner with shelters to how we support adopters.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Value Card 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 group">
                <div class="w-16 h-16 bg-orange-100 text-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">
                    To save lives by connecting dogs in need with loving adopters and promoting responsible pet ownership throughout the entire adoption journey.
                </p>
            </div>
            
            <!-- Value Card 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 group">
                <div class="w-16 h-16 bg-orange-100 text-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Our Team</h3>
                <p class="text-gray-600 leading-relaxed">
                    A dedicated network of volunteers, foster families, and animal advocates working together to create meaningful connections between dogs and their future families.
                </p>
            </div>
            
            <!-- Value Card 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 group">
                <div class="w-16 h-16 bg-orange-100 text-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a4 4 0 112.76 3.77" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Our Promise</h3>
                <p class="text-gray-600 leading-relaxed">
                    To support adopters through every step of the process and ensure every dog finds a safe, happy, and loving home where they can thrive for years to come.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-orange-600 text-white relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-orange-500 rounded-full -mt-32 -mr-32 opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-yellow-500 rounded-full -mb-40 -ml-40 opacity-40"></div>
    
    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <h2 class="text-3xl md:text-5xl font-bold mb-6">Ready to Make a Difference?</h2>
        <p class="text-lg md:text-xl mb-10 max-w-2xl mx-auto font-light">
            We're always looking for volunteers, foster families, and supporters. Join our community and help us create happy endings for more dogs in need.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="/contact" class="bg-white text-orange-600 px-8 py-4 rounded-lg text-lg font-medium hover:bg-orange-100 transition shadow-md">
                Become a Volunteer
            </a>
            <a href="/contact" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-medium hover:bg-white/10 transition shadow-md">
                Contact Us
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14">
            <span class="inline-block py-1 px-3 rounded-full bg-orange-100 text-orange-600 font-medium text-sm mb-4">Success Stories</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Happy Tails</h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                Here's what some of our adopters and their furry friends have to say about their Adogtion experience.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Testimonial 1 -->
            <div class="bg-gray-50 rounded-2xl p-8 shadow-md">
                <div class="flex items-center mb-6">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=150&q=80" alt="Adopter" class="w-16 h-16 rounded-full object-cover mr-4" />
                    <div>
                        <h4 class="font-bold text-gray-800">Sarah & Max</h4>
                        <p class="text-gray-500">Adopted December 2023</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "The process was so smooth and supportive. Our adoption coordinator helped us find the perfect match in Max, and we couldn't imagine our lives without him now!"
                </p>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-gray-50 rounded-2xl p-8 shadow-md">
                <div class="flex items-center mb-6">
                    <img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?auto=format&fit=crop&w=150&q=80" alt="Adopter" class="w-16 h-16 rounded-full object-cover mr-4" />
                    <div>
                        <h4 class="font-bold text-gray-800">James & Luna</h4>
                        <p class="text-gray-500">Adopted March 2024</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "As a first-time dog owner, I was nervous about adoption. The Adogtion team provided all the resources and guidance I needed. Luna and I are inseparable now!"
                </p>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="#" class="inline-flex items-center text-orange-500 font-medium hover:text-orange-600">
                Read more success stories
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection