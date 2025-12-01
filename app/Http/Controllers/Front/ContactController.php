<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactInquiryMail;
use App\Models\ConsultingInquiry;
use Illuminate\Http\Request;
use App\Models\PageContact;
use App\Models\ContactInquiry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

        if ($request->inquiry_type == 'consulting') {
            ConsultingInquiry::create($validated);
        } else {
            ContactInquiry::create($validated);
        }

        // Send email to admin
        // try {
        //     Mail::to('admin@example.com')->send(new ContactInquiryMail($validated));
        // } catch (\Exception $e) {
        //     Log::error("Contact Inquiry Email Failed: " . $e->getMessage());
        // }

        return response()->json([
            'success' => true,
            'message' => 'Thank you for contacting FranchiseME! Our team will get back to you shortly.'
        ]);
    }
}
