<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageService;
use App\Models\Franchise;

class ServiceController extends Controller
{
    public function service()
    {
        $service = PageService::first();
        return view('frontend.service', compact('service'));
    }

    public function serviceDetail($slug)
    {
        $franchise = Franchise::where('franchise_slug', $slug)->first();

        return view('frontend.service_detail', compact('franchise'));
    }
}