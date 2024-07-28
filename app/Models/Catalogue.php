<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalogue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'path_highlight',
        'thumbnail',
        'price',
        'vendor_id',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function catalogue_benefits(){
        return $this->hasMany(CatalogueBenefit::class);
    }

    public function catalogue_images(){
        return $this->hasMany(CatalogueImage::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
