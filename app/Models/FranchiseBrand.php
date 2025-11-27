<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseBrand extends Model
{
    protected $table = 'franchise_brands';

    protected $fillable = [
        'slider_background_image',
        'brand_image',
        'brand_tag',
        'brand_tag_ar',
        'brand_title',
        'brand_title_ar',
        'brand_slug',
        'brand_description',
        'brand_description_ar',
        'brand_button',
        'brand_button_ar',
        'brand_button_url',
        'brand_button_url_ar',
    ];
}