<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'disc', 'status'];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'images_brands');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_brands');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_brands');
    }
}
