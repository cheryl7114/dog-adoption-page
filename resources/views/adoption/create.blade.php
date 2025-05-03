<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adoption Request for {{ $dog->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css') <!-- Only if you're using Vite/Tailwind -->
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-xl mx-auto py-16 px-4">
        <h1 class="text-3xl font-bold mb-6 text-orange-600">Adoption Request for {{ $dog->name }}</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('adoption.store', $dog) }}" method="POST" class="bg-white p-8 rounded-xl shadow-md space-y-6">
            @csrf
            <div>
                <label class="block font-semibold mb-1" for="contact_email">Your Email</label>
                <input type="email" name="contact_email" id="contact_email" required class="w-full border rounded px-3 py-2" value="{{ old('contact_email', auth()->user()->email ?? '') }}">
                @error('contact_email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1" for="contact_phone">Phone Number</label>
                <input type="text" name="contact_phone" id="contact_phone" required class="w-full border rounded px-3 py-2" value="{{ old('contact_phone') }}">
                @error('contact_phone') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block font-semibold mb-1" for="message">Why do you want to adopt {{ $dog->name }}?</label>
                <textarea name="message" id="message" rows="5" class="w-full border rounded px-3 py-2">{{ old('message') }}</textarea>
                @error('message') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600 font-semibold">Submit Request</button>
        </form>
    </div>
</body>
</html>
