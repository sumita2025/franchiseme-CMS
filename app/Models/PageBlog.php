<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageBlog extends Model
{
   
    protected $table = 'page_blogs';

    protected $fillable = [
        'background_image',
        'title',
        'title_ar',
        'description',
        'description_ar'
    ];
}
