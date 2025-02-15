@extends('users.layouts.main')
@section('title', 'Product Bid')
@section('Bid')

<style>
    .bidding-container {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        padding: 20px;
    }
    .bidding-table {
        flex: 1;
        background: #f9f9f9;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .bidding-table h3 {
        margin-bottom: 10px;
    }
    .bidding-table table {
        width: 100%;
        border-collapse: collapse;
    }
    .bidding-table th, .bidding-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .bidding-table input {
        width: 80%;
        padding: 8px;
        margin-right: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .bidding-table button {
        background: #28a745;
        color: white;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 5px;
    }
    .bidding-table button:hover {
        background: #218838;
    }
    .product-image {
        flex: 0.4;
        text-align: center;
    }
    .product-image img {
        width: 150px;
        height: auto;
        border-radius: 10px;
    }
    .product-image h4 {
        margin: 10px 0;
    }
</style>

<div class="hero-section">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('users.index') }}">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li><span>{{ $data->category_name }}</span></li>
        </ul>

        <div class="bidding-container">
            <!-- Left Side: Bidding Table -->
            <div class="bidding-table">
                <h3>Place Your Bid</h3>
                <form id="bidForm">
                    @csrf
                    <input type="number" name="bid_amount" id="bid_amount" placeholder="Enter your bid" 
                        min="{{ $data->current_bid + 950 }}" step="950" required>
                    <button type="submit">Place Bid</button>
                </form>

                <!-- Live Bid Table -->
                <h3>Live Bids</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Bidder</th>
                            <th>Amount</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody id="bidTable">
                        @foreach($bids as $bid)
                        <tr>
                            <td>{{ $bid->user->name }}</td>
                            <td>${{ $bid->amount }}</td>
                            <td>{{ $bid->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Right Side: Product Image -->
            <div class="product-image">
                <img src="{{ asset('product_images/'.$data->product_image) }}" alt="product">
                <h4>{{ $data->product_name }}</h4>
                <p>Starting Bid: ${{ $data->product_price }}</p>
                <p>Current Balance: ${{ $data->Balance }}</p>
            </div>
        </div>
    </div>
    <div class="bg_img hero-bg bottom_center" data-background="{{ asset('auction/assets/images/banner/hero-bg.png') }}"></div>
</div>

<!-- jQuery & Pusher -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>
    $(document).ready(function () {
        // Pusher Setup
        Pusher.logToConsole = true; 

        var pusher = new Pusher(@json(env('PUSHER_APP_KEY')), {
            cluster: @json(env('PUSHER_APP_CLUSTER')),
            encrypted: true
        });

        var channel = pusher.subscribe("live-bid-channel_{{ $data->id }}");

        // Listen for bid updates
        channel.bind("Next-bid-event_{{ $data->id }}", function (data) {
            let bid = data.new_bid;

            if (!bid || !bid.user) {
                console.error("Invalid bid data:", data);
                return;
            }

            let newRow = `
                <tr>
                    <td>${bid.user.name}</td>
                    <td>$${bid.amount}</td>
                    <td>${new Date().toLocaleTimeString()}</td>
                </tr>
            `;

            // ✅ Corrected table insertion
            $("#bidTable").prepend(newRow);
        });

        // AJAX Form Submit
        $("#bidForm").submit(function (event) {
            event.preventDefault(); // Prevent default form submission

            let formData = {
                bid_amount: $("#bid_amount").val(),
                _token: $('input[name="_token"]').val()
            };

            $.ajax({
                url: "{{ route('LiveBid', ['id' => $data->id]) }}",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $("#bid_amount").val(""); // ✅ Clear input field after successful bid
                    } else {
                        alert("Bid submission failed. Try again!");
                    }
                },
                error: function (xhr) {
                    let errorMsg = "An error occurred. Please try again!";
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMsg = xhr.responseJSON.error;
                    }
                    alert(errorMsg);
                }
            });
        });
    });
</script>

@endsection
