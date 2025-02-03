<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\{Categories, products};

class ProductBidController extends Controller
{
    public function show($id)
    {
        dd($id);
        $categories = DB::table('categories')->get();
        $product = products::all();

        return view('product-bid', ['categorydata' => $categories, 'bidproduct' => $product]);
    }
}
