<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContact;

class ContactPageController extends Controller
{
    public function index()
    {
        $page = PageContact::first();
        return view('pages.contact', compact('page'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile("background_image")) {
            $background_image = $request->file("background_image")
                ->store('uploads/pages/background', 'public');
            $data['background_image'] = $background_image;
        }

        // Handle social icon images (1-5 for English)
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("social_icon_image_$i")) {
                $data["social_icon_image_$i"] = $request->file("social_icon_image_$i")
                    ->store('uploads/icons', 'public');
            }
        }

        // Handle social icon images (1-5 for Arabic)
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("social_icon_image_{$i}_ar")) {
                $data["social_icon_image_{$i}_ar"] = $request->file("social_icon_image_{$i}_ar")
                    ->store('uploads/icons', 'public');
            }
        }

        PageContact::updateOrCreate(['id' => 1], $data);

        return response()->json([
            'status' => 'success',
            'message' => 'Contact Page Updated Successfully!'
        ]);
    }
}