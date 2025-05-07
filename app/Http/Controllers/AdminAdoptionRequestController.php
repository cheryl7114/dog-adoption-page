<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdoptionRequest;

class AdminAdoptionRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
    $search = $request->query('search');
    $adoptionRequests = \App\Models\AdoptionRequest::with(['dog', 'user'])
        ->when($status, fn($q) => $q->where('status', $status))
        ->when($search, function($q) use ($search) {
            $q->whereHas('user', fn($q) => $q->where('name', 'like', "%$search%"))
              ->orWhereHas('dog', fn($q) => $q->where('name', 'like', "%$search%"))
              ->orWhere('contact_email', 'like', "%$search%");
        })
        ->latest()
        ->paginate(15)
        ->appends($request->except('page'));
    return view('admin.adoption', compact('adoptionRequests', 'status', 'search'));
    }

    public function approveAdoptionRequest(AdoptionRequest $adoptionRequest)
{
    $adoptionRequest->update(['status' => 'approved']);
    return back()->with('success', 'Request approved.');
}

public function rejectAdoptionRequest(AdoptionRequest $adoptionRequest)
{
    $adoptionRequest->update(['status' => 'rejected']);
    return back()->with('success', 'Request rejected.');
}
}