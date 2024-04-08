<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoriesByBrand($brandId)
{
    try {
        $categories = Category::whereHas('brands', function($query) use ($brandId) {
            $query->where('brand_id', $brandId);
        })->get();

        return response()->json($categories);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}
