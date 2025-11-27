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
        return view('frontend.franchise', compact('content', 'brands', 'franchises'));
    }   
}