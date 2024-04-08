<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'discount', 'status'];

    public function categories()
    {
        return $this->belongsToMany(Discategory::class, 'discategories_discounts', 'discount_id', 'discategories_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_discounts', 'discount_id', 'product_id');
    }
}
