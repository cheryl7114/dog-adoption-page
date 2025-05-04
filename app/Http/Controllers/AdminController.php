<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\User;
use App\Models\AdoptionRequest;

class AdminController extends Controller
{
    public function index()
    {
        // Get dogs with pagination
        $dogs = Dog::latest()->paginate(10);
        
        // Get stats for the dashboard
        $availableDogs = Dog::where('status', 'available')->count();
        $users = User::count();
        $adoptionRequests = 0;  // Replace with real count when you have this model
        $successfulAdoptions = 0;  // Replace with real count when you have this model
        
        return view('admin.dashboard', compact(
            'dogs',
            'availableDogs',
            'users',
            'adoptionRequests',
            'successfulAdoptions'
        ));
    }
}