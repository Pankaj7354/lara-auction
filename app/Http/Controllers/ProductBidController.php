<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\{Categories, products};
use Illuminate\Support\Facades\Auth;

class ProductBidController extends Controller
{
    public function show($id)
    {
        $categories = DB::table('categories')->get();
        $product = products::all();

        return view('product-bid', ['categorydata' => $categories, 'bidproduct' => $product]);
    }
    public function placeBid(Request $request)
    {

        $product = Products::find($request->product_id);
        dd($request->all());
        $minBid = $product->current_bid + 950;

        // Validate bid amount
        $request->validate([
            'bid_amount' => "required|numeric|min:$minBid"
        ]);
        // Save the new bid
        Bid::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'amount' => $request->bid_amount
        ]);

        // Update the current bid
        $product->current_bid = $request->bid_amount;
        $product->save();

        return back()->with('success', 'Bid placed successfully!');
    }
}
