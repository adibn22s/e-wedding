<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatalogueImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'path_image',
        'catalogue_id',
    ];

    public function catalogue() {
        return $this->belongsTo(Catalogue::class);
    }
}
