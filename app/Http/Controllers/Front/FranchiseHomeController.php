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
        $countries = Franchise::select('country')
            ->distinct()
            ->pluck('country')
            ->toArray();
        $countries_ar =  Franchise::select('country_ar')->distinct()->pluck('country_ar')->groupBy('country_ar')->toArray();
        $sector =  Franchise::select('sector')->distinct()->pluck('sector')->groupBy('sector')->toArray();
        $sector_ar =  Franchise::select('sector_ar')->distinct()->pluck('sector_ar')->groupBy('sector_ar')->toArray();
        $investment_level =  Franchise::select('investment_level')->distinct()->pluck('investment_level')->groupBy('investment_level')->toArray();
        $investment_level_ar =  Franchise::select('investment_level_ar')->distinct()->pluck('investment_level_ar')->groupBy('investment_level_ar')->toArray();
   
        return view('frontend.franchise', compact('content', 'brands', 'franchises', 'countries', 'countries_ar','sector','sector_ar','investment_level','investment_level_ar'));
    }
}
