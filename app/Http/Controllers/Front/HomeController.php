<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHome;
use App\Models\HomeClientLogo;
use App\Models\Team;
use App\Models\TeamPage;

class HomeController extends Controller
{
    public function home()
    {
        $content = PageHome::first();
        $clientImages = HomeClientLogo::all();
        $teams = Team::get();
        $team_page = TeamPage::first();
        return view('frontend.index', compact('content', 'clientImages','teams','team_page'));
    }
}
