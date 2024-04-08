<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use  App\Models\Category;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.add', compact('categories', 'brands'));
    }


    public function single($id)
{
    $product = Product::findOrFail($id);

    return view('product.product', compact('product'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:0,1',
            'name' => 'required|string',
            'disc' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'size' => 'required|string',
            'sizeDis' => 'required|string',
            'color' => 'required|string',
            'maintenance' => 'required|string',
            'tags' => 'required|string',
            'brand' => 'required|exists:brands,id',
            'category1' => 'required|exists:categories,id',
        ]);

        $product = new Product();
        $product->status = $validatedData['status'];
        $product->name = $validatedData['name'];
        $product->disc = $validatedData['disc'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->size = $validatedData['size'];
        $product->sizeDis = $validatedData['sizeDis'];
        $product->color = $validatedData['color'];
        $product->maintenance = $validatedData['maintenance'];
        $product->brand_id = $validatedData['brand'];
        $product->category_id = $validatedData['category1'];
        $product->save();

        if ($request->has('tags')) {
            $tags = explode(' ', $validatedData['tags']);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $product->tags()->attach($tag);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filePath = $image->store('uploads', 'public');
                $imageModel = new Image(['img' => $filePath]); // Assuming 'img' is the field for storing image paths
                $imageModel->save();
                $product->images()->attach($imageModel->id);
            }
        }

        return redirect()->back()->with('success', 'Product created successfully!');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $products = Product::paginate(3);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        $categories = Category::all();
        $brands = Brand::all();
        
        return view('product.edit', compact('categories', 'brands', 'product'));
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validatedData = $request->validate([
        'status' => 'required|in:0,1',
        'name' => 'required|string',
        'disc' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'size' => 'required|string',
        'sizeDis' => 'required|string',
        'color' => 'required|string',
        'maintenance' => 'required|string',
        'tags' => 'required|string',
        'brand' => 'required|exists:brands,id',
        'category1' => 'required|exists:categories,id',
    ]);

    $product->update([
        'status' => $validatedData['status'],
        'name' => $validatedData['name'],
        'disc' => $validatedData['disc'],
        'price' => $validatedData['price'],
        'quantity' => $validatedData['quantity'],
        'size' => $validatedData['size'],
        'sizeDis' => $validatedData['sizeDis'],
        'color' => $validatedData['color'],
        'maintenance' => $validatedData['maintenance'],
        'brand_id' => $validatedData['brand'],
        'category_id' => $validatedData['category1'],
    ]);

    if ($request->has('tags')) {
        $tags = explode('#', $validatedData['tags']);
        $product->tags()->detach(); // Clear existing tags
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $product->tags()->attach($tag);
        }
    }

    $product->images()->detach();

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filePath = $image->store('uploads', 'public');
            $imageModel = new Image(['img' => $filePath]); // Assuming 'img' is the field for storing image paths
            $imageModel->save();
            $product->images()->attach($imageModel->id);
        }
    }

    return redirect()->back()->with('success', 'Product updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $product = Product::findOrFail($id);

    $product->status = 0;
    $product->save();

    return redirect()->back()->with('success', 'Product status updated successfully.');
}
}

