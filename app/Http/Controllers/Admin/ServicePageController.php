<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageService;

class ServicePageController extends Controller
{
    public function index()
    {
        $service = PageService::first();
        return view('pages.services', compact('service'));
    }

    public function store(Request $request)
    {
      
        $data = $request->except('_token');

        if ($request->hasFile("side_image")) {
            $data["side_image"] = $request->file("side_image")
                ->store('uploads/pages/side_image', 'public');
        }
        if ($request->hasFile("background_image")) {
            $data["background_image"] = $request->file("background_image")
                ->store('uploads/pages/background', 'public');
        }

        // Handle image uploads
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("service_image{$i}")) {
                $data["service_image{$i}"] = $request->file("service_image{$i}")
                    ->store('uploads/pages/service', 'public');
            }
        }

        PageService::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Service Page Updated Successfully!');
    }
}