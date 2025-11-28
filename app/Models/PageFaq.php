<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageFaq extends Model
{
    protected $table = 'page_faqs';

    protected $fillable = [
        'title',
        'title_ar',
        'description',
        'description_ar',
        'background_image'
    ];

    public function items()
    {
        return $this->hasMany(PageFaqItem::class, 'faq_page_id');
    }
}
