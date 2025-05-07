@extends('layouts.app')

@section('content')
<section class="py-20 px-4 bg-gradient-to-b from-yellow-50 to-orange-50 min-h-[80vh]">
    <div class="max-w-2xl mx-auto">
        <div class="flex flex-col items-center mb-10">
            <div class="bg-orange-100 rounded-full p-4 mb-4 shadow">
                <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25V6.75A2.25 2.25 0 0018.75 4.5H5.25A2.25 2.25 0 003 6.75v10.5A2.25 2.25 0 005.25 19.5h13.5A2.25 2.25 0 0021 17.25v-1.5M16.5 12l-4.5 3-4.5-3" />
                </svg>
            </div>
            <h1 class="text-4xl font-extrabold text-orange-600 mb-2">Contact Us</h1>
            <p class="text-center text-gray-600 mb-2 max-w-md">
                Have a question, suggestion, or want to get in touch? Fill out the form below and we’ll get back to you soon!
            </p>
        </div>

        @if(session('success'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 4000)" 
                x-show="show"
                class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" 
                role="alert"
                x-transition
            >
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}" class="space-y-6 bg-white/90 p-8 rounded-2xl shadow-lg border border-orange-100">
            @csrf
            <div>
                <label for="name" class="block font-semibold text-gray-700 mb-2">Your Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="email" class="block font-semibold text-gray-700 mb-2">Your Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="message" class="block font-semibold text-gray-700 mb-2">Message</label>
                <textarea name="message" id="message" rows="5" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition resize-none">{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold text-lg shadow hover:bg-orange-600 transition">
                Send Message
            </button>
        </form>
    </div>
</section>
@endsection