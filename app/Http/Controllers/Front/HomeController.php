<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHome;
use App\Models\HomeClientLogo;

class HomeController extends Controller
{
    public function home()
    {
        $content = PageHome::first();
        $clientImages = HomeClientLogo::all();
        return view('frontend.index', compact('content', 'clientImages'));
    }
}