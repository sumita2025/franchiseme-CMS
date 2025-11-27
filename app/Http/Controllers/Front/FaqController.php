<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageFaq;
use App\Models\PageFaqItem;

class FaqController extends Controller
{
    public function faqs()
    {
        $faq = PageFaq::first();
        $faqItems = PageFaqItem::get();
        return view('frontend.faq', compact('faq', 'faqItems'));
    }
}