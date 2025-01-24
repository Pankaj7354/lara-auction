<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = products::all();
        return view('admin.product', compact('data'));
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
        // Validate request
        $request->validate([
            'product_name' => 'required|string|max:50',
            'product_price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_sub_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Sub-images validation
            'category_id' => 'required|numeric|exists:categories,id', // Ensures category exists
            'product_bid_start' => 'required|date',
            'product_bid_end' => 'required|date|after:product_bid_start',
        ]);

        // Handle single main product image
        $image = $request->file('product_image');
        $imageName = time() . '_main.' . $image->getClientOriginalExtension();
        $image->move(public_path('/product_images'), $imageName);

        // Handle multiple sub-images
        $subImageNames = [];
        if ($request->hasFile('product_sub_image')) {
            foreach ($request->file('product_sub_image') as $index => $subImage) {
                $subImageName = time() . "_sub_{$index}." . $subImage->getClientOriginalExtension();
                $subImage->move(public_path('/product_images'), $subImageName);
                $subImageNames[] = $subImageName;
            }
        }

        // Save product data
        $product = new products();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_image = $imageName;
        $product->product_sub_image = json_encode($subImageNames); // Save sub-images as JSON
        $product->category_id = $request->category_id;
        $product->product_bid_start = $request->product_bid_start;
        $product->product_bid_end = $request->product_bid_end;
        $product->save();

        // Redirect back with success message
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $products)
    {
        //
    }
}
