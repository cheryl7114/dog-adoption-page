<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dogs = Dog::orderBy('id', 'asc')->paginate(10);
        return view('admin.dogs.index', compact('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|numeric|min:0',
            'description' => 'required|string',
            'status' => 'required|in:available,adopted,pending',
            'size' => 'required|string|in:small,medium,large',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $dog = new Dog();
        $dog->name = $validated['name'];
        $dog->breed = $validated['breed'];
        $dog->age = $validated['age'];
        $dog->description = $validated['description'];
        $dog->status = $validated['status'];
        $dog->size = $validated['size'];
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/dogs', 'public');
            $dog->image_path = $path;
        }
        
        $dog->save();
        
        return redirect()->route('admin.dashboard')
            ->with('success', 'Dog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dog $dog)
    {
        return view('admin.dogs.show', compact('dog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dog $dog)
    {
        return view('admin.dogs.edit', compact('dog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dog $dog)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|numeric|min:0',
            'description' => 'required|string',
            'status' => 'required|in:available,adopted,pending',
            'size' => 'required|string|in:small,medium,large',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $dog->name = $validated['name'];
        $dog->breed = $validated['breed'];
        $dog->age = $validated['age'];
        $dog->description = $validated['description'];
        $dog->status = $validated['status'];
        $dog->size = $validated['size'];
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($dog->image_path) {
                Storage::disk('public')->delete($dog->image_path);
            }
            $path = $request->file('image')->store('images/dogs', 'public');
            $dog->image_path = $path;
        }
        
        $dog->save();
        
        return redirect()->route('admin.dashboard')
            ->with('success', 'Dog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dog $dog)
    {
        if ($dog->image_path) {
            Storage::disk('public')->delete($dog->image_path);
        }
        
        $dog->delete();
        
        return redirect()->route('admin.dashboard')
            ->with('success', 'Dog deleted successfully!');
    }
}