<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageFaqItem extends Model
{
    protected $table = 'page_faq_items';

    protected $fillable = [
        'faq_page_id',
        'question',
        'answer',
        'question_ar',
        'answer_ar'
    ];

    public function page()
    {
        return $this->belongsTo(PageFaq::class, 'faq_page_id');
    }
}