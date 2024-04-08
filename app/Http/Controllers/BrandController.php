<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
    return view('brand.add', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'status' => 'required|in:0,1',
        'name' => 'required|string|max:255',
        'disc' => 'required|string',
        'tags' => 'required|string',
        'category1' => 'required|exists:categories,id',
        'category2' => 'required|exists:categories,id',
    ]);

    $brand = Brand::create([
        'status' => $validatedData['status'],
        'name' => $validatedData['name'],
        'disc' => $validatedData['disc'],
    ]);

    if (!empty($validatedData['tags'])) {
        $tags = explode('#', $validatedData['tags']);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $brand->tags()->attach($tag);
        }
    }

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filePath = $image->store('uploads', 'public');
            $imageModel = Image::create(['img' => $filePath]);
            $brand->images()->attach($imageModel);
        }
    }

    $brand->categories()->attach([$validatedData['category1'], $validatedData['category2']]);

    return redirect()->back()->with('success', 'Brand created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $brand = Brand::findOrFail($id);
    $categories = Category::all();
    
    return view('brand.edit', compact('brand', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $brand = Brand::findOrFail($id);

    $validatedData = $request->validate([
        'status' => 'required|in:0,1',
        'name' => 'required|string|max:255',
        'disc' => 'required|string',
        'tags' => 'required|string',
        'category1' => 'required|exists:categories,id',
        'category2' => 'required|exists:categories,id',
    ]);

    $brand->update([
        'status' => $validatedData['status'],
        'name' => $validatedData['name'],
        'disc' => $validatedData['disc'],
    ]);

    $brand->tags()->detach();
    if (!empty($validatedData['tags'])) {
        $tags = explode(' ', $validatedData['tags']);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $brand->tags()->attach($tag);
        }
    }

    $brand->images()->detach();
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filePath = $image->store('uploads', 'public');
            $imageModel = Image::create(['img' => $filePath]);
            $brand->images()->attach($imageModel);
        }
    }

    $brand->categories()->sync([$validatedData['category1'], $validatedData['category2']]);

    return redirect()->back()->with('success', 'Brand updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $brand = Brand::findOrFail($id);

    $brand->status = 0;
    $brand->save();

    return redirect()->back()->with('success', 'Brand status updated successfully.');
}
}
