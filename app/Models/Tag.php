<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function products()
{
    return $this->belongsToMany(Product::class, 'tags_products');
}

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'tags_brands');
    }
}
