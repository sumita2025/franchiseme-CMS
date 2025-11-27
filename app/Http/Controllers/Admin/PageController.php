<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('title')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'slug' => ['required','string','max:255','unique:pages,slug'],
            'meta_title' => ['nullable','string','max:255'],
            'meta_description' => ['nullable','string'],
        ]);
        $page = Page::create($data);
        return redirect()->route('admin.pages.edit', $page)->with('success','Page created');
    }

    public function edit(Page $page)
    {
        $page->load('sections');
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'slug' => ['required','string','max:255','unique:pages,slug,'.$page->id],
            'meta_title' => ['nullable','string','max:255'],
            'meta_description' => ['nullable','string'],
        ]);
        $page->update($data);
        return back()->with('success','Page updated');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success','Page deleted');
    }
}
