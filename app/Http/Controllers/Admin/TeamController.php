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
        return view('pages.team.index', compact('teams', 'team_page'));
    }

    public function create()
    {
        return view('pages.team.create');
    }

    /**
     * Store new team
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'title_ar'          => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'description_ar'    => 'nullable|string'

        ]);


         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/team'), $filename);
            $validated['image'] = 'uploads/team/' . $filename;
        }
        
        Team::create($validated);

        return redirect()->route('admin.home.index')->with('success', 'Team saved successfully.');
    }

    /**
     * Show single blog
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('pages.team.create', compact('team'));
    }

    /**
     * Update team
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

         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/team'), $filename);
            $validated['image'] = 'uploads/team/' . $filename;
        }


        $team->update($validated);

         return redirect()->route('admin.home.index')->with('success', 'Team updated successfully.');
    }

    /**
     * Delete team
     */
    public function destroy($id)
    {
        try {
            $team = Team::findOrFail($id);

            // delete image if exist
            if ($team->image && file_exists(public_path($team->image))) {
                unlink(public_path($team->image));
            }

            $team->delete();
            
            // Return JSON response for AJAX requests
            if (request()->expectsJson()) {
                return response()->json(['success' => true, 'message' => 'Team deleted successfully']);
            }
            
            return redirect()->route('admin.home.index')->with('success', 'Team deleted successfully.');
        } catch (\Exception $e) {
            if (request()->expectsJson()) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 404);
            }
            return redirect()->route('admin.home.index')->with('error', 'Team not found.');
        }
    }

    public function team_page_store(Request $request)
    {

        $data = $request->except('_token');
        TeamPage::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Team Page Updated Successfully!');
    }
}
