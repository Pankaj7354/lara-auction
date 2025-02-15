<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Models\{Categories, Products, Bid};
use App\Events\LiveBidEvent;
use App\Jobs\ProcessBid;
use Pusher\Pusher;

class ProductBidController extends Controller
{
    public function placeBid(Request $request, $id)
    {
        // प्रोडक्ट ढूंढें, अगर नहीं मिला तो 404 एरर दिखाएं
        $product = Products::findOrFail($id);

        // अगर GET रिक्वेस्ट है, तो बिड लिस्ट भेजें
        if ($request->isMethod('get')) {
            $bids = Bid::where('product_id', $product->id)
                ->with('user') // यूजर डेटा लोड करें
                ->latest()
                ->paginate(10);

            return view('users.product-bid', [
                'data' => $product,
                'bids' => $bids
            ]);
        }

        // यूजर लॉग इन है या नहीं
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $minNextBid = $product->current_bid + 950;

        // बिड अमाउंट को वैलिडेट करें
        $request->validate([
            'bid_amount' => 'required|numeric|min:' . ($product->current_bid + 950),
        ]);

        // बिड को स्टोर करें
        $bid = Bid::create([
            'user_id'    => Auth::id(),
            'product_id' => $id,
            'amount'     => $request->bid_amount,
        ]);

        // करंट बिड अपडेट करें
        $product->update(['current_bid' => $request->bid_amount]);

        // Pusher सेटअप
        $options = [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS'  => true,
        ];

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        // Pusher इवेंट ट्रिगर करें
        $pusher->trigger('live-bid-channel_' . $id, 'Next-bid-event_' . $id, [
            'product_id' => $id,
            'new_bid'    => $bid->load('user'), // यूजर डेटा भी भेजें
        ]);

        // बिड को बैकग्राउंड में प्रोसेस करने के लिए Queue में भेजें
        ProcessBid::dispatch($bid);

        // JSON रिस्पॉन्स भेजें
        return response()->json(['success' => true, 'bid' => $bid]);
    }
}
