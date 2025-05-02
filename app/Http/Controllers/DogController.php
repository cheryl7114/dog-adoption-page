<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index()
    {
        // Get all available dogs
        $dogs = Dog::where('status', 'available')
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
        
        return view('dogs.index', compact('dogs'));
    }
    
    public function show($id)
    {
        $dog = Dog::findOrFail($id);
        return view('dogs.show', compact('dog'));
    }
}