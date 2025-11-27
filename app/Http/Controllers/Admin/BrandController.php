<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FranchiseBrand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
     /**
     * Display all brands
     */
    public function index()
    {
        $brands = FranchiseBrand::latest()->get();
        return view('pages.list_brand', compact('brands'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('pages.add_brand');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $brand = FranchiseBrand::findOrFail($id);
        return view('pages.add_brand', compact('brand'));
    }

    /**
     * Store or Update brand
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_title' => 'required|string|max:255',
            'brand_tag' => 'nullable|string|max:255',
        ]);

        // Auto slug generation
        $slug = Str::slug($request->brand_title);
        $existingSlugCount = FranchiseBrand::where('brand_slug', 'like', $slug . '%')->count();
        if ($existingSlugCount > 0) {
            $slug .= '-' . ($existingSlugCount + 1);
        }

        // Prepare file upload paths
        $sliderBackground = $this->uploadFile($request, 'slider_background_image', 'uploads/brands/background_image/');
        $brandImage = $this->uploadFile($request, 'brand_image', 'uploads/brands');

        // Save or Update record
        $brand = FranchiseBrand::updateOrCreate(
            ['id' => $request->id],
            [
                'slider_background_image' => $sliderBackground ?? $request->old_slider_background_image ?? null,
                'brand_image'             => $brandImage ?? $request->old_brand_image ?? null,
                'brand_tag'               => $request->brand_tag,
                'brand_title'             => $request->brand_title,
                'brand_description'       => $request->brand_description,
                'brand_button'            => $request->brand_button,
                'brand_button_url'        => $request->brand_button_url,
                'brand_slug'                    => $slug,
            ]
        );

        return redirect()->route('admin.brands.index')->with('success', 'Brand saved successfully.');
    }

    /**
     * Delete brand
     */
    public function destroy($id)
    {
        $brand = FranchiseBrand::findOrFail($id);
        if ($brand->brand_image && file_exists(public_path('uploads/brands/' . $brand->brand_image))) {
            unlink(public_path('uploads/brands/' . $brand->brand_image));
        }
        if ($brand->slider_background_image && file_exists(public_path('uploads/brands/' . $brand->slider_background_image))) {
            unlink(public_path('uploads/brands/background_image/' . $brand->slider_background_image));
        }
        $brand->delete();
        return redirect()->back()->with('success', 'Brand deleted successfully.');
    }

    /**
     * Handle File Upload
     */
    private function uploadFile($request, $fieldName, $path)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            return $filename;
        }
        return null;
    }
}