<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\User;
// Uncomment when you create these models
// use App\Models\AdoptionRequest;

class AdminController extends Controller
{
    public function index()
    {
        // Count statistics for dashboard
        $stats = [
            'dogs' => Dog::count(),
            'users' => User::where('role', 'user')->count(),
            // Uncomment when you create AdoptionRequest model
            // 'adoptionRequests' => AdoptionRequest::count() ?? 0,
            // 'pendingRequests' => AdoptionRequest::where('status', 'pending')->count() ?? 0,
            'adoptionRequests' => 0,
            'pendingRequests' => 0,
        ];
        
        // Get recent items
        $recentDogs = Dog::latest()->take(5)->get();
        // Uncomment when you create AdoptionRequest model
        // $recentAdoptions = AdoptionRequest::latest()->take(5)->get();
        $recentAdoptions = collect(); // Empty collection for now
        
        return view('admin.dashboard', compact('stats', 'recentDogs', 'recentAdoptions'));
    }
}