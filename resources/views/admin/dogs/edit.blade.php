@extends('layouts.admin')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">Edit Dog: {{ $dog->name }}</h1>
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-200 active:bg-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back to List
                    </a>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-50 border border-red-200 text-red-800 rounded-md p-4">
                            <div class="font-medium">Please fix the following errors:</div>
                            <ul class="mt-2 ml-4 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.dogs.update', $dog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Dog Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $dog->name) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="breed" class="block text-sm font-medium text-gray-700">Breed</label>
                                <input type="text" name="breed" id="breed" value="{{ old('breed', $dog->breed) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                                <select name="size" id="size" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50">
                                    <option value="small" {{ (old('size', $dog->size) == 'small') ? 'selected' : '' }}>Small</option>
                                    <option value="medium" {{ (old('size', $dog->size) == 'medium') ? 'selected' : '' }}>Medium</option>
                                    <option value="large" {{ (old('size', $dog->size) == 'large') ? 'selected' : '' }}>Large</option>
                                </select>
                            </div>

                            <div>
                                <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                                <input type="number" name="age" id="age" min="0" step="0.1" value="{{ old('age', $dog->age) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50">
                                    <option value="available" {{ (old('status', $dog->status) == 'available') ? 'selected' : '' }}>Available</option>
                                    <option value="pending" {{ (old('status', $dog->status) == 'pending') ? 'selected' : '' }}>Pending Adoption</option>
                                    <option value="adopted" {{ (old('status', $dog->status) == 'adopted') ? 'selected' : '' }}>Adopted</option>
                                </select>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="4"
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50">{{ old('description', $dog->description) }}</textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Dog Photo</label>
                                
                                @if($dog->image_path)
                                    <div class="mb-3">
                                        <p class="text-sm text-gray-500 mb-1">Current image:</p>
                                        <img src="{{ asset('storage/' . $dog->image_path) }}" 
                                            alt="{{ $dog->name }}"
                                            class="h-32 w-auto object-cover rounded-md border border-gray-200">
                                    </div>
                                @endif
                                
                                <div class="mt-1 flex items-center">
                                    <div id="preview" class="hidden w-32 h-32 rounded-md border-2 border-dashed border-gray-300 flex items-center justify-center mr-4">
                                        <img class="max-h-full max-w-full object-cover rounded" id="image-preview" src="#" alt="Preview">
                                    </div>
                                    <label class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                        <span>Change image</span>
                                        <input id="image-input" name="image" type="file" class="sr-only" accept="image/*">
                                    </label>
                                    <p class="ml-3 text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Leave empty to keep the current image</p>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end">
                            <button type="button" onclick="window.location.href='{{ route('admin.dashboard') }}'" class="mr-3 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                Cancel
                            </button>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:border-orange-700 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Update Dog
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('image-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                const preview = document.getElementById('preview');
                const imagePreview = document.getElementById('image-preview');
                
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection