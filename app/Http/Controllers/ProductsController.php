<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\Categories;
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
        $data = products::orderBy('id', 'desc')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();
        $category = Categories::all();
        return view('admin.product', compact('data', 'category'));
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
        // dd($request->toArray());
        // Validate request
        $request->validate([
            'product_name' => 'required|string|max:50',
            'product_price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            // 'product_sub_image.*' => 'image|mimes:jpeg,png,jpg,gif', // Sub-images validation
            'category_id' => 'required|numeric', // Ensures category exists
            'product_bid_start' => 'required|date',
            'product_bid_end' => 'required|date|after:product_bid_start',
        ]);
        // dd($request->toArray());


        // Handle single main product image
        $image = $request->file('product_image');
        $imageName = time() . '_main.' . $image->getClientOriginalExtension();
        $image->move(public_path('/product_images'), $imageName);

        // Handle multiple sub-images
        // $subImageNames = [];
        // if ($request->hasFile('product_sub_image')) {
        //     foreach ($request->file('product_sub_image') as $index => $subImage) {
        //         $subImageName = time() . "_sub_{$index}." . $subImage->getClientOriginalExtension();
        //         $subImage->move(public_path('/product_images'), $subImageName);
        //         $subImageNames[] = $subImageName;
        //     }
        // }

        // Save product data
        $product = new products();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_image = $imageName;
        // $product->product_sub_image = json_encode($subImageNames); // Save sub-images as JSON
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
    public function edit(string $id)
    {
        $data = products::find($id);
        $category = Categories::all();
        return view('admin.product', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:50',
            'product_price' => 'required|numeric',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif',
            // 'product_sub_image.*' => 'image|mimes:jpeg,png,jpg,gif', // Sub-images validation
            'category_id' => 'required|numeric', // Ensures category exists
            'product_bid_start' => 'required|date',
            'product_bid_end' => 'required|date|after:product_bid_start',
        ]);
        // dd($request->toArray());
        $product = products::findOrFail($id);
        // dd($product);
        try {
            // Update main image if a new file is uploaded
            if ($request->hasFile('product_image')) {
                // Delete the old main image
                $oldMainImagePath = public_path('product_images/' . $product->product_image);
                if (File::exists($oldMainImagePath)) {
                    File::delete($oldMainImagePath);
                }

                // Save the new main image
                $image = $request->file('product_image');
                $imageName = time() . '_main.' . $image->getClientOriginalExtension();
                $image->move(public_path('/product_images'), $imageName);

                $product->product_image = $imageName;
            }
            // dd($product);

            // Update sub-images if new files are uploaded
            // if ($request->hasFile('product_sub_image')) {
            //     // Delete the old sub-images
            //     $oldSubImages = json_decode($product->product_sub_image, true); // Decode JSON to an array
            //     if (is_array($oldSubImages)) {
            //         foreach ($oldSubImages as $subImage) {
            //             $subImagePath = public_path('product_images/' . $subImage);
            //             if (File::exists($subImagePath)) {
            //                 File::delete($subImagePath);
            //             }
            //         }
            //     }

            //     // Save the new sub-images
            //     $subImageNames = [];
            //     foreach ($request->file('product_sub_image') as $index => $subImage) {
            //         $subImageName = time() . "_sub_{$index}." . $subImage->getClientOriginalExtension();
            //         $subImage->move(public_path('/product_images'), $subImageName);
            //         $subImageNames[] = $subImageName;
            //     }

            //     $product->product_sub_image = json_encode($subImageNames); // Save sub-images as JSON
            // }
            // dd($product);

            // Update other product data
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->category_id = $request->category_id;
            $product->product_bid_start = $request->product_bid_start;
            $product->product_bid_end = $request->product_bid_end;
            $product->save();
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return redirect()->route('product.index')->with('error', 'An error occurred while updating the product.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = products::find($id); // Use findOrFail to ensure proper handling of non-existing products

        try {
            // Delete the main product image
            $productImagePath = public_path('product_images/' . $product->product_image);
            if (File::exists($productImagePath)) {
                File::delete($productImagePath);
            }

            // // If sub-images are stored as JSON or array, delete them too
            // if (!empty($product->product_sub_image)) {
            //     $productSubImages = json_decode($product->product_sub_image, true); // Decode JSON to an array
            //     if (is_array($productSubImages)) {
            //         foreach ($productSubImages as $subImage) {
            //             $subImagePath = public_path('product_images/' . $subImage);
            //             if (File::exists($subImagePath)) {
            //                 File::delete($subImagePath);
            //             }
            //         }
            //     }
            // }

            // Delete the product from the database
            $product->delete();

            // Redirect back with success message
            return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return redirect()->route('product.index')->with('error', 'An error occurred while deleting the product.');
        }
    }
}
