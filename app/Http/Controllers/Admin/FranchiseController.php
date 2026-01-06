<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchise;
use Illuminate\Support\Str;

class FranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::latest()->get();
        return view('pages.list_franchise', compact('franchises'));
    }

    public function create()
    {
        return view('pages.add_franchise');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'slider_background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/franchise'), $filename);
            $data['logo'] = 'uploads/franchise/' . $filename;
        }
        if ($request->hasFile('slider_background_image')) {
            $file = $request->file('slider_background_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/franchise'), $filename);
            $data['slider_background_image'] = 'uploads/franchise/' . $filename;
        }

        // Auto slug from title
        $slugBase = \Str::slug($request->title);
        $slug = $slugBase;
        $count = 1;
        while (Franchise::where('franchise_slug', $slug)->exists()) {
            $slug = "{$slugBase}-{$count}";
            $count++;
        }
        $data['franchise_slug'] = $slug;

        Franchise::create($data);

        return redirect()->route('admin.franchise.index')->with('success', 'Franchise created successfully!');
    }

    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);
        return view('pages.add_franchise', compact('franchise'));
    }

    public function update(Request $request, $id)
    {
        $franchise = Franchise::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/franchise'), $filename);
            $data['logo'] = 'uploads/franchise/' . $filename;
        }

        if ($request->hasFile('slider_background_image')) {
            $file = $request->file('slider_background_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/franchise'), $filename);
            $data['slider_background_image'] = 'uploads/franchise/' . $filename;
        }

        $data['slug'] = Str::slug($request->title);
        $franchise->update($data);

        return redirect()->route('admin.franchise.index')->with('success', 'Franchise updated successfully!');
    }

    public function destroy($id)
    {
        $franchise = Franchise::find($id);
        
        if (!$franchise) {
            if (request()->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Franchise not found'], 404);
            }
            return redirect()->route('admin.franchise.index')->with('error', 'Franchise not found.');
        }

        $franchise->delete();
        
        // Return JSON response for AJAX requests
        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Franchise deleted successfully']);
        }
        
        return redirect()->route('admin.franchise.index')->with('success', 'Franchise deleted successfully!');
    }

    public function updateStatus(Request $request)
    {
        $franchise = Franchise::find($request->id);

        if (!$franchise) {
            return response()->json(['message' => 'Franchise not found'], 404);
        }

        $franchise->status = $request->status;
        $franchise->save();

        return response()->json([
            'message' => 'Status updated successfully',
            'status' => $franchise->status
        ]);
    }
}
