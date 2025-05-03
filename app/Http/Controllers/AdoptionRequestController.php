<?php
namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionRequestController extends Controller
{
    public function create(Dog $dog)
    {
        return view('adoption.create', compact('dog'));
    }

    public function store(Request $request, Dog $dog)
    {
        $validated = $request->validate([
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:30',
            'message' => 'nullable|string|max:1000',
        ]);

        AdoptionRequest::create([
            'user_id' => Auth::id(),
            'dog_id' => $dog->id,
            'contact_email' => $validated['contact_email'],
            'contact_phone' => $validated['contact_phone'],
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('adoption.create', $dog)->with('success', 'Your adoption request has been submitted!');
    }
}