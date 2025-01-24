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
        // dd($request->all());
        $request->validate([
            'product_name' => 'required|string|max:50',
            'product_price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'product_sub_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|numeric',
            'product_bid_start' => ['required', 'date'],
            'product_bid_end' =>
            [
                'required',
                'date',
                'after:product_bid_start',
            ]
        ]);
        // dd($request->all());
        $image = $request->file('product_image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/product_images');
        $image->move($path, $name);

        $sub_image = $request->file('product_sub_image');
        $sub_name = time() . '.' . $sub_image->getClientOriginalExtension();
        $sub_path = public_path('/product_images');
        $sub_image->move($sub_path, $sub_name);

        $product = new products();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_image = $name;
        $product->product_sub_image = $sub_name;
        $product->category_id = $request->category_id;
        $product->product_bid_start = $request->product_bid_start;
        $product->product_bid_end = $request->product_bid_end;
        $product->save();

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
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
