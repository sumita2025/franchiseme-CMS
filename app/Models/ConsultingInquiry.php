<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultingInquiry extends Model
{
    use HasFactory;
    protected $table = "consulting_inquiries";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];
}
