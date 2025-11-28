<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\PageBlog;

class BlogPageController extends Controller
{
    /** 
     * Display list of blogs 
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        $pageBlog = PageBlog::first();
        return view('pages.list_blog', compact('blogs', 'pageBlog'));
    }

    public function create()
    {
        return view('pages.add_blog');
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
            'description_ar'    => 'nullable|string',
            'feature_image'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_at'      => 'nullable|date',
        ]);

        // Upload image if exists
        if ($request->hasFile('feature_image')) {

            $filename = time() . '_' . $request->file('feature_image')->getClientOriginalName();
            $request->file('feature_image')->move(public_path('uploads/blogs'), $filename);

            $validated['feature_image'] = 'uploads/blogs/' . $filename;
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog saved successfully.');
    }

    /** 
     * Show single blog
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        // return view('frontend.singleblog', compact('blog'));

        return view('pages.add_blog', compact('blog'));
    }

    /**
     * Update blog
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'title_ar'          => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'description_ar'    => 'nullable|string',
            'feature_image'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_at'      => 'nullable|date',
        ]);

        // Image update
        if ($request->hasFile('feature_image')) {

            // delete old image
            if ($blog->feature_image && file_exists(public_path($blog->feature_image))) {
                unlink(public_path($blog->feature_image));
            }

            $filename = time() . '_' . $request->file('feature_image')->getClientOriginalName();
            $request->file('feature_image')->move(public_path('uploads/blogs'), $filename);

            $validated['feature_image'] = 'uploads/blogs/' . $filename;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
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

    public function blog_page_store(Request $request)
    {

        $data = $request->except('_token');

        if ($request->hasFile('background_image')) {

            $filename = time() . '_' . $request->file('background_image')->getClientOriginalName();
            $request->file('background_image')->move(public_path('uploads/blog'), $filename);

            $data['background_image'] = 'uploads/blog/' . $filename;
        }

        PageBlog::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Service Page Updated Successfully!');
    }
}
