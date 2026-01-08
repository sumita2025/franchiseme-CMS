<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHome;
use App\Models\HomeClientLogo;
use App\Models\Team;

class HomePageController extends Controller
{
    public function index()
    {
        $home = PageHome::first();
        $clientImages = HomeClientLogo::all();
        $teams = Team::get();
        return view('pages.home', compact('home', 'clientImages','teams'));
    }

    // public function save(Request $request)
    // {
    //     $data = $request->except(['_token']);

    //     // handle image uploads
    //     $uploadFields = [
    //         'hero_background_image',
    //         'about_image',
    //         'achievement_image'
    //     ];

    //     for ($i = 1; $i <= 5; $i++) {
    //         $uploadFields[] = "team_image{$i}";
    //     }
    //     for ($i = 1; $i <= 8; $i++) {
    //         $uploadFields[] = "client_logo_image{$i}";
    //     }

    //     foreach ($uploadFields as $field) {
    //         if ($request->hasFile($field)) {
    //             $data[$field] = $request->file($field)->store('uploads/home', 'public');
    //         }
    //     }

    //     PageHome::updateOrCreate(['id' => 1], $data);

    //     return back()->with('success', 'Homepage content saved successfully!');
    // }

    public function save(Request $request)
    {
        $data = $request->except(['_token', 'client_logo_image']);

        // handle static image uploads
        $uploadFields = [
            'hero_background_image',
            'about_image',
            'achievement_image',
            'strategy_image',
            'strategy_image_ar',
            'vision_icon_image',
            'mission_icon_image'
        ];

        for ($i = 1; $i <= 5; $i++) {
            $uploadFields[] = "team_image{$i}";
        }

        foreach ($uploadFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('uploads/home', 'public');
            }
        }

        // Save or update home page data
        $home = PageHome::updateOrCreate(['id' => 1], $data);

        /** -----------------------------------
         *  Handle Dynamic Client Logos
         * ----------------------------------*/
        if ($request->hasFile('client_logo_image')) {
            foreach ($request->file('client_logo_image') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('uploads/home/client_logos', 'public');

                    HomeClientLogo::create([
                        'page_home_id' => $home->id,
                        'logo_path' => $path,
                    ]);
                }
            }
        }

        return back()->with('success', 'Homepage content and client logos saved successfully!');
    }

    public function destroy($id)
    {
        $clientImage = HomeClientLogo::find($id);

        if (!$clientImage) {
            return response()->json(['success' => false, 'message' => 'Logo not found']);
        }

        if ($clientImage->logo_path && \Storage::disk('public')->exists($clientImage->logo_path)) {
            \Storage::disk('public')->delete($clientImage->logo_path);
        }

        $clientImage->delete();

        return response()->json(['success' => true, 'message' => 'Logo deleted successfully']);
    }
}
