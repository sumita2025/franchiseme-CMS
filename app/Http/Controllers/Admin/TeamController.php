<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\PageBlog;
use App\Models\PageHome;
use App\Models\Team;
use App\Models\TeamPage;

class TeamController extends Controller
{
    /** 
     * Display list of blogs 
     */
    public function index()
    {
        $teams = Team::get();
        $team_page = TeamPage::first();
        return view('pages.team.index', compact('teams','team_page'));
    }

    public function create()
    {
        return view('pages.team.create');
    }

    /** 
     * Store new blog 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'title_ar'          => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'description_ar'    => 'nullable|string'
          
        ]);

        Team::create($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team saved successfully.');
    }

    /** 
     * Show single blog
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('pages.team.create',compact('team'));
    }

    /**
     * Update blog
     */
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'title_ar'          => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'description_ar'    => 'nullable|string'
        ]);


        $team->update($validated);

        return redirect()->route('admin.home.index')->with('success', 'Team updated successfully.');
    }

    /**
     * Delete blog 
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // delete image if exist
        if ($blog->feature_image && file_exists(public_path('storage/' . $blog->feature_image))) {
            unlink(public_path('storage/' . $blog->feature_image));
        }

        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

    public function team_page_store(Request $request)
    {

        $data = $request->except('_token');
        TeamPage::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Team Page Updated Successfully!');
    }

    
}
