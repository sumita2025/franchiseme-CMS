<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationForm;

class ApplicationFormController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone_number'     => 'required|string|max:50',
            'country'          => 'required|string|max:255',
            'brand'            => 'nullable|string|max:255',
            'investment_range' => 'nullable|string|max:255',
            'message'          => 'nullable|string',
        ]);

        // Get page source from URL (e.g. title-1 or title-2)
        $url = $request->headers->get('referer');
        $pageSource = null;

        if ($url && preg_match('/service-detail\/([a-zA-Z0-9\-]+)/', $url, $matches)) {
            $pageSource = $matches[1]; // captures 'title-1' or 'title-2'
        }

        $validated['page_source'] = $pageSource;

        ApplicationForm::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your interest! Our team will contact you soon.'
        ], 200);
    }
}