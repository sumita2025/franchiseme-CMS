<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeClientLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_home_id',
        'logo_path',
    ];

    public function home()
    {
        return $this->belongsTo(PageHome::class, 'page_home_id');
    }
}