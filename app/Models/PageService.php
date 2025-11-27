<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageService extends Model
{
    protected $table = 'page_services';

    protected $fillable = [
        'title',
        'title_ar',
        'description',
        'description_ar',
        'consultant_title',
        'consultant_title_ar',
        'consultant_description',
        'consultant_description_ar',
        'button_text',
        'button_text_ar',
        'button_url',
        'button_url_ar',
        'package_section_title',
        'package_section_title_ar',
        'package_section_description',
        'package_section_description_ar',
        'service_image1', 'service_title1', 'service_title1_ar', 'service_description1', 'service_description1_ar',
        'service_image2', 'service_title2', 'service_title2_ar', 'service_description2', 'service_description2_ar',
        'service_image3', 'service_title3', 'service_title3_ar', 'service_description3', 'service_description3_ar',
        'service_image4', 'service_title4', 'service_title4_ar', 'service_description4', 'service_description4_ar',
        'service_image5', 'service_title5', 'service_title5_ar', 'service_description5', 'service_description5_ar',
        'package_title',
        'package_title_ar',
        'package_button_text',
        'package_button_text_ar',
        'package_button_url',
        'package_button_url_ar',
        'service_title',
        'service_title_ar',
        'service_description',
        'service_description_ar',
    ];
}