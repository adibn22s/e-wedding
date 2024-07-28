<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'website_name',
        'phone_number1',
        'phone_number2',
        'email1',
        'email2',
        'address',
        'maps',
        'logo_path',
        'instagram_url',
        'youtube_url',
    ];
}
