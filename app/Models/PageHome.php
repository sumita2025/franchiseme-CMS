<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageHome extends Model
{
    protected $table = 'page_home';

    protected $guarded = [];

    public function clientLogos()
    {
        return $this->hasMany(HomeClientLogo::class, 'page_home_id');
    }
}