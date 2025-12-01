<?php

use App\Models\Setting;
use Illuminate\Support\Str;

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        return Setting::where('key', $key)->value('value') ?? $default;
    }
}

if (!function_exists('test_helper')) {
    function test_helper()
    {
        return "Helper Working!";
    }
}

if (!function_exists('html_limit_safe')) {
    function html_limit_safe($html, $limit = 200)
    {
        $allowed = '<br><b><strong><i><em><span>';
        $clean = strip_tags($html, $allowed);

        return Str::limit($clean, $limit);
    }
    //  {!! html_limit_safe(app()->getLocale() == 'ar' ? $blog->description_ar : $blog->description, 200) !!}  //add this line in blog page line no. 62 
}
