@extends('layouts.app')

@section('content')
<section class="py-16 px-4 bg-white">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8 text-orange-600">Contact Us</h1>
        <p class="text-center text-gray-600 mb-10">
            Have a question, suggestion, or want to get in touch? Fill out the form below and we’ll get back to you soon!
        </p>

        @if(session('success'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 4000)" 
                x-show="show"
                class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" 
                role="alert"
                x-transition
            >
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}" class="space-y-6 bg-orange-50 p-8 rounded-xl shadow">
            @csrf
            <div>
                <label for="name" class="block font-semibold text-gray-700 mb-2">Your Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 transition"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="email" class="block font-semibold text-gray-700 mb-2">Your Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 transition"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="message" class="block font-semibold text-gray-700 mb-2">Message</label>
                <textarea name="message" id="message" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 transition">{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold text-lg hover:bg-orange-600 transition">
                Send Message
            </button>
        </form>
    </div>
</section>
@endsection