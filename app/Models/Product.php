<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'name', 'disc', 'price', 'quantity', 'size', 'sizeDis', 'color', 'maintenance', 'brand_id', 'category_id'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'images_products');
    }

public function tags()
{
    return $this->belongsToMany(Tag::class, 'tags_products');
}

public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
