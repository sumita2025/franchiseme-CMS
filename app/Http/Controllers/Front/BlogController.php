<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Models\Blog;
use App\Models\PageBlog;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::latest()->paginate(6);
        $recentBlogs = Blog::latest()->take(5)->get();
        $pageBlog = PageBlog::first();
        return view('frontend.blogs', compact('blogs', 'recentBlogs','pageBlog'));
    }
    public function singleblog($id)
    {
        $blog = Blog::findOrFail($id);
        $pageBlog = PageBlog::first();
        return view('frontend.singleblog', compact('blog','pageBlog'));
    }
}
