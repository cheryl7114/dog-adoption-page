<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get the 3 most recently added available dogs
        $featuredDogs = Dog::where('status', 'available')
                           ->latest()
                           ->take(3)
                           ->get();
        
        return view('welcome', compact('featuredDogs'));
    }
}