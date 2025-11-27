<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageFranchise;
use App\Models\FranchiseBrand;
use App\Models\Franchise;
use Illuminate\Support\Str;

class FranchisePageController extends Controller
{
    public function index()
    {
        $page = PageFranchise::first();
        $brands = FranchiseBrand::all();
        $franchises = Franchise::all();
        return view('pages.opportunities', compact('page', 'brands', 'franchises'));
    }

    public function store(Request $request)
    {
        $page = PageFranchise::updateOrCreate(['id' => 1], [
            'title' => $request->title,
            'description' => $request->description,
            'brand_title' => $request->brand_title,
            'franchise_title' => $request->franchise_title,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'brand_title_ar' => $request->brand_title_ar,
            'franchise_title_ar' => $request->franchise_title_ar,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Franchise Page updated successfully!']);
    }

    public function storeBrand(Request $request)
    {
        $slug = Str::slug($request->brand_title);
        FranchiseBrand::create([
            'slider_background_image' => $request->slider_background_image,
            'brand_image' => $request->brand_image,
            'brand_tag' => $request->brand_tag,
            'brand_title' => $request->brand_title,
            'brand_slug' => $slug,
            'brand_description' => $request->brand_description,
            'brand_button' => $request->brand_button,
            'brand_button_url' => $request->brand_button_url,
        ]);
        return response()->json(['status' => 'success', 'message' => 'Brand added successfully!']);
    }

    public function storeFranchise(Request $request)
    {
        $slug = Str::slug($request->title);
        Franchise::create([
            'logo' => $request->logo,
            'sector' => $request->sector,
            'country' => $request->country,
            'title' => $request->title,
            'description' => $request->description,
            'investment_level' => $request->investment_level,
            'link_text' => $request->link_text,
            'link_url' => $request->link_url,
            'franchise_slug' => $slug,
        ]);
        return response()->json(['status' => 'success', 'message' => 'Franchise added successfully!']);
    }
}