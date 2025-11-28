<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $table = 'service_pages';

    protected $fillable = [
        'image',
        'title',
        'title_ar',
        'description',
        'description_ar'
    ];
}
