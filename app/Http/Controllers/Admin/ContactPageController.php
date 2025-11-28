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
        }
      
        $data['background_image'] = $background_image ?? null;
        PageContact::updateOrCreate(['id' => 1], $data);

        return response()->json([
            'status' => 'success',
            'message' => 'Contact Page Updated Successfully!'
        ]);
    }
}