<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamPage extends Model
{
     protected $table = 'team_pages';
     protected $fillable = [
        'title',
        'title_ar',
        'description',
        'description_ar',
    ];
}
