<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Categories, products};

class openController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $product = products::all();


        return view('users.index', ['data' => $categories, 'product' => $product]);
    }
    public function WithCategoriesId($id)
    {

        $product = products::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')->where('products.category_id', '=', $id)->get();
        // dd($product->toArray());
        return view('users.productid', ['data' => $product, 'item' => $id]);
    }
    public function productdetail($id)
    {
        $categories = DB::table('categories')->get();

        $product = products::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->findorfail($id);

        return view('users.productdetail', ['data' => $product, 'categorydata' => $categories]);
    }
    public function show($id)
    {
        $product = products::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->findorfail($id);


        return view('users.product-bid', ['data' => $product]);
    }
}
