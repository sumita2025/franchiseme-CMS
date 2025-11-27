<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContact extends Model
{
    protected $table = 'page_contacts';

    protected $fillable = [
        'page_title',
        'page_title_ar',
        'title',
        'title_ar',
        'description',
        'description_ar',
        'phone_text',
        'phone_text_ar',
        'phone_value',
        'phone_value_ar',
        'whatsapp_text',
        'whatsapp_text_ar',
        'whatsapp_value',
        'whatsapp_value_ar',
        'email_text',
        'email_text_ar',
        'email_value',
        'email_value_ar',
        'social_media_text',
        'social_media_text_ar',
        'social_link_1',
        'social_link_1_ar',
        'social_link_2',
        'social_link_2_ar',
        'social_link_3',
        'social_link_3_ar',
        'social_link_4',
        'social_link_4_ar',
        'social_link_5',
        'social_link_5_ar',
        'social_url_1',
        'social_url_1_ar',
        'social_url_2',
        'social_url_2_ar',
        'social_url_3',
        'social_url_3_ar',
        'social_url_4',
        'social_url_4_ar',
        'social_url_5',
        'social_url_5_ar',
        'map_embed'
    ];
}