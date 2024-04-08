<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use  App\Models\Category;
use App\Models\Product;
use  App\Models\Discategory;
use Illuminate\Support\Facades\Validator;



class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discategories = Discategory::all();
        return view('discount.add', compact('discategories'));
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
        'name' => 'required|string',
        'disc' => 'required|string',
        'category1' => 'required|exists:discategories,id',
        'category2' => 'required|exists:discategories,id',
        'tags' => 'required|string',
    ]);

    $tagsArray = explode('#', $validatedData['tags']);

    $tagsArray = array_filter($tagsArray);

    foreach ($tagsArray as $tag) {
        $validator = Validator::make(['tag' => $tag], [
            'tag' => 'exists:products,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    $discount = new Discount();
    $discount->status = $validatedData['status'];
    $discount->name = $validatedData['name'];
    $discount->discount = $validatedData['disc'];
    $discount->save();

    $discount->categories()->attach([$validatedData['category1'], $validatedData['category2']]);

    if (!empty($tagsArray)) {
        $discount->products()->attach($tagsArray);
    }

    return redirect()->back()->with('success', 'Discount created successfully!');
}

    

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        $discounts = Discount::all();
        return view('discount.index', compact('discounts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        $discategories = Discategory::all();
        return view('discount.edit', compact('discategories', 'discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'status' => 'required|in:0,1',
        'name' => 'required|string',
        'disc' => 'required|string',
        'category1' => 'required|exists:discategories,id',
        'category2' => 'required|exists:discategories,id',
        'tags' => 'required|string',
    ]);

    $tagsArray = explode('#', $validatedData['tags']);
    $tagsArray = array_filter($tagsArray);

    foreach ($tagsArray as $tag) {
        $validator = Validator::make(['tag' => $tag], [
            'tag' => 'exists:products,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    $discount = Discount::findOrFail($id);
    $discount->status = $validatedData['status'];
    $discount->name = $validatedData['name'];
    $discount->discount = $validatedData['disc'];
    $discount->save();

    $discount->categories()->sync([$validatedData['category1'], $validatedData['category2']]);

    if (!empty($tagsArray)) {
        $discount->products()->sync($tagsArray);
    } else {
        // If no products are selected, detach all existing ones
        $discount->products()->detach();
    }

    return redirect()->back()->with('success', 'Discount updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $discount = Discount::findOrFail($id);

    $discount->status = 0;
    $discount->save();

    return redirect()->back()->with('success', 'Discount status updated successfully.');
}
}
