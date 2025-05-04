<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;

class AdminAdoptionRequestController extends Controller
{
    public function index()
    {
        $adoptionRequests = AdoptionRequest::with(['dog', 'user'])->latest()->paginate(15);
        return view('admin.adoption', compact('adoptionRequests'));
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