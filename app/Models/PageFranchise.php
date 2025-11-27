<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageFranchise extends Model
{
    protected $table = 'page_franchises';
    protected $fillable = [
        'title', 'title_ar', 'description', 'description_ar', 'brand_title', 'brand_title_ar', 'franchise_title', 'franchise_title_ar'
    ];
}