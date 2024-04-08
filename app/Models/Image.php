<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['img'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'images_brands');
    }
}
