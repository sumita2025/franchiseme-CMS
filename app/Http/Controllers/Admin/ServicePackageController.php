<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePackage;
use App\Models\PageBlog;
use App\Models\ServicePage;
use App\Models\Team;

class ServicePackageController extends Controller
{
    /**
     * Display list of blogs
     */
    public function index()
    {
        $services = ServicePackage::get();
        $common_data =   ServicePage::first();
        return view('pages.service_package.index', compact('services','common_data'));
    }

    public function create()
    {
        return view('pages.service_package.create');
    }

    /**
     * Store new blog
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'title_ar'          => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'description_ar'    => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

        ]);

         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/service_package'), $filename);
            $validated['image'] = 'uploads/service_package/' . $filename;
        }

        ServicePackage::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service saved successfully.');
    }

    /**
     * Show single blog
     */
    public function edit($id)
    {
        $service = ServicePackage::findOrFail($id);
        return view('pages.service_package.create', compact('service'));
    }

    /**
     * Update blog
     */
    public function update(Request $request, $id)
    {
        $team = ServicePackage::findOrFail($id);

        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'title_ar'          => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'description_ar'    => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/service_package'), $filename);
            $validated['image'] = 'uploads/service_package/' . $filename;
        }


        $team->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Delete blog
     */
    public function destroy($id)
    {
        $service = ServicePackage::findOrFail($id);

        // delete image if exist
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    public function service_page_store(Request $request)
    {

        $data = $request->except('_token');
        ServicePage::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Service Page Updated Successfully!');
    }
}
