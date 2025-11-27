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