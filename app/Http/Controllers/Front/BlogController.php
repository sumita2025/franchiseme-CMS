<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::latest()->paginate(6);
        $recentBlogs = Blog::latest()->take(5)->get();
        return view('frontend.blogs', compact('blogs', 'recentBlogs'));
    }
    public function singleblog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.singleblog', compact('blog'));
    }
}
