<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContact;
use App\Models\ContactInquiry;

class ContactController extends Controller
{
    public function contact()
    {
        $contact = PageContact::first();
        return view('frontend.contact', compact('contact'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        ContactInquiry::create($validated);

        return response()->json([
            'success' => true, 
            'message' => 'Thank you for contacting FranchiseME! Our team will get back to you shortly.'
        ]);
    }
}