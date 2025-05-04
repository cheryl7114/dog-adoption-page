<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdoptionRequest;

class AdminAdoptionRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $adoptionRequests = \App\Models\AdoptionRequest::with(['dog', 'user'])
            ->when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(15)
            ->appends(['status' => $status]);
        return view('admin.adoption', compact('adoptionRequests', 'status'));
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