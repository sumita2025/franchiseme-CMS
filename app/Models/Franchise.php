<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = 'franchises';

    protected $fillable = [
        'logo',
        'sector',
        'sector_ar',
        'country',
        'country_ar',
        'title',
        'title_ar',
        'description',
        'description_ar',
        'investment_level',
        'investment_level_ar',
        'link_text',
        'link_text_ar',
        'link_url',
        'link_url_ar',
        'franchise_slug',
        'is_active',
        'slider_background_image',
        'tag',
        'tag_ar',
        'status'

        
    ];
}