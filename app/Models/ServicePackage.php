<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    protected $table = 'service_packages';

    protected $fillable = [
        'image',
        'title',
        'title_ar',
        'description',
        'description_ar'
    ];
}
