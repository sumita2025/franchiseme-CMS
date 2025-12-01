<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageFranchise;
use App\Models\FranchiseBrand;
use App\Models\Franchise;

class FranchiseHomeController extends Controller
{
    public function franchise_brand()
    {
        $content = PageFranchise::first();
        $brands = FranchiseBrand::get();
        $franchises = Franchise::get();
        $countries = Franchise::pluck('country')
            ->map(fn($item) => trim(ucwords(strtolower($item))))
            ->unique()
            ->values();

        $sector = Franchise::pluck('sector')
            ->map(fn($item) => trim(ucwords(strtolower($item))))
            ->unique()
            ->values();

        $investment_level = Franchise::pluck('investment_level')
            ->map(fn($item) => trim(ucwords(strtolower($item))))
            ->unique()
            ->values();

        $countries_ar = Franchise::pluck('country_ar')
            ->map(fn($item) => trim(mb_strtolower($item)))
            ->unique()
            ->values();

        $sector_ar = Franchise::pluck('sector_ar')
            ->map(fn($item) => trim(mb_strtolower($item)))
            ->unique()
            ->values();

        $investment_level_ar = Franchise::pluck('investment_level_ar')
            ->map(fn($item) => trim(mb_strtolower($item)))
            ->unique()
            ->values();

        return view('frontend.franchise', compact('content', 'brands', 'franchises', 'countries', 'countries_ar', 'sector', 'sector_ar', 'investment_level', 'investment_level_ar'));
    }
}
