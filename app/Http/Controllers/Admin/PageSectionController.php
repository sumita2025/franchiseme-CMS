<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSectionController extends Controller
{
    public function index(Page $page)
    {
        $sections = $page->sections;
        return view('admin.pages.sections', compact('page','sections'));
    }

    public function create(Page $page)
    {
        return view('admin.sections.create', compact('page'));
    }

    public function store(Request $request, Page $page)
    {
        $data = $request->validate([
            'section_key' => ['required','string','max:100'],
            'title' => ['nullable','string','max:255'],
            'subtitle' => ['nullable','string','max:255'],
            'content_html' => ['nullable','string'],
            'cta_label' => ['nullable','string','max:255'],
            'cta_url' => ['nullable','string','max:2048'],
            'order_no' => ['nullable','integer','min:0'],
            'image' => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('pages', 'public');
        }

        $data['page_id'] = $page->id;
        $data['order_no'] = $data['order_no'] ?? ($page->sections()->max('order_no') + 1);

        PageSection::create($data);

        return redirect()->route('admin.pages.sections.index', $page)->with('success','Section added');
    }

    public function edit(PageSection $section)
    {
        $page = $section->page;
        return view('admin.sections.edit', compact('page','section'));
    }

    public function update(Request $request, PageSection $section)
    {
        $data = $request->validate([
            'title' => ['nullable','string','max:255'],
            'subtitle' => ['nullable','string','max:255'],
            'content_html' => ['nullable','string'],
            'cta_label' => ['nullable','string','max:255'],
            'cta_url' => ['nullable','string','max:2048'],
            'order_no' => ['nullable','integer','min:0'],
            'image' => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('image')) {
            if ($section->image_path) {
                Storage::disk('public')->delete($section->image_path);
            }
            $data['image_path'] = $request->file('image')->store('pages', 'public');
        }

        $section->update($data);

        return redirect()->route('admin.sections.edit', $section)->with('success','Section updated');
    }

    public function destroy(PageSection $section)
    {
        $page = $section->page;
        if ($section->image_path) {
            Storage::disk('public')->delete($section->image_path);
        }
        $section->delete();
        return redirect()->route('admin.pages.sections.index', $page)->with('success','Section deleted');
    }
}
