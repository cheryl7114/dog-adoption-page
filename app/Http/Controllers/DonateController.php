<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        return view('donate');
    }
    
    public function process(Request $request)
    {
        // This method will be for handling donation confirmation
        // after returning from PayPal
        return redirect()->route('donate')->with('success', 'Thank you for your donation!');
    }
}