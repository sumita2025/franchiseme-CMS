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

        // return view('frontend.franchise_old', compact('content', 'brands', 'franchises', 'countries', 'countries_ar', 'sector', 'sector_ar', 'investment_level', 'investment_level_ar'));
        return view('frontend.franchise', compact('content', 'brands', 'franchises', 'countries', 'countries_ar', 'sector', 'sector_ar', 'investment_level', 'investment_level_ar'));
    }

    // FranchiseController (or whatever your controller is named)

    // NEWLY ADDED FUNCTION TO HANDLE AJAX FILTERING
    public function filterFranchises(Request $request)
    {
        $query = Franchise::query();

        // 1. SEARCH FILTER
        if ($request->filled('search')) {
            $search = $request->input('search');
            // Search by franchise name (title) or sector
            $query->where(function ($q) use ($search,$request) {
                $q->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('sector', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%');

                // Handle Arabic search if locale is 'ar'
                if ($request->input('locale') == 'ar') {
                    $q->orWhere('title_ar', 'LIKE', '%' . $search . '%')
                        ->orWhere('sector_ar', 'LIKE', '%' . $search . '%')
                        ->orWhere('description_ar', 'LIKE', '%' . $search . '%');
                }
            });
        }

        // 2. COUNTRY FILTER
        if ($request->filled('country')) {
            $country = $request->input('country');
            if ($request->input('locale') == 'ar') {
                $query->where('country_ar', $country);
            } else {
                $query->where('country', $country);
            }
        }

        // 3. SECTOR FILTER
        if ($request->filled('sector')) {
            $sector = $request->input('sector');
            if ($request->input('locale') == 'ar') {
                $query->where('sector_ar', $sector);
            } else {
                $query->where('sector', $sector);
            }
        }

        // 4. INVESTMENT LEVEL FILTER
        if ($request->filled('investment_level')) {
            $investment_level = $request->input('investment_level');
            if ($request->input('locale') == 'ar') {
                $query->where('investment_level_ar', $investment_level);
            } else {
                $query->where('investment_level', $investment_level);
            }
        }

        $franchises = $query->get();

        // RENDER THE LISTING CARDS ONLY
        $html = view('frontend.franchise_listings', compact('franchises'))->render();

        // Return JSON response for AJAX
        return response()->json(['html' => $html]);
    }
}
