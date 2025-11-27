<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Models\ContactMessage;
use App\Models\ApplicationForm;

class InquiryController extends Controller
{
    // Contact Inquiry
    public function contactInquiry()
    {
        $inquiries = ContactInquiry::latest()->get();
        return view('inquiry', compact('inquiries'));
    }

    // Service Training Inquiry
    public function serviceTrainingInquiry()
    {
        $inquiries = ContactMessage::latest()->get();
        return view('training', compact('inquiries'));
    }

    // Specific Service Inquiry
    public function specificServiceInquiry()
    {
        $inquiries = ApplicationForm::latest()->get();
        return view('specific', compact('inquiries'));
    }
}
