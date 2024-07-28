<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'is_active',
        'name',
        'bank_name',
        'account_number',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function catalogues() {
        return $this->hasMany(Catalogue::class);
    }
}
