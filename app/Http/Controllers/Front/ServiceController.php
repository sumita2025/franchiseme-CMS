<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageService;
use App\Models\Franchise;
use App\Models\ServicePackage;
use App\Models\ServicePage;

class ServiceController extends Controller
{
    public function service()
    {
        $service = PageService::first();
        $service_packages = ServicePackage::get();
        return view('frontend.service', compact('service','service_packages'));
    }

    public function serviceDetail($slug)
    {
        $franchise = Franchise::where('franchise_slug', $slug)->first();

        return view('frontend.service_detail', compact('franchise'));
    }
}
