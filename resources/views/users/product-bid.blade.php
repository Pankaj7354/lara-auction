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

.bidding-table form {
    margin-top: 15px;
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


    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('users.index')}}">Home</a>
                </li>
                <li>
                    
                    <a href="0">Pages</a>
                </li>
                <li>
                    <span>{{$data->category_name}}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('auction/assets/images/banner/hero-bg.png')}}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= About Section Starts Here =============-->
    {{-- <section class="product-details padding-bottom mt--240 mt-lg--440">
        <div class="container">
            <div class="product-details-container">
                <!-- Left Side: Bedding Tables -->
                <div class="bedding-tables">
                    <table border="1px">
                        <tr><th>Size</th><th>Material</th></tr>
                        <tr><td>King</td><td>Cotton</td></tr>
                        <tr><td>Queen</td><td>Silk</td></tr>
                    </table>
                </div>
            
                <!-- Right Side: Product Image -->
                <div class="product-details-slider-top-wrapper">
                    <div class="product-details-slider owl-theme owl-carousel" id="sync1">
                        <div class="slide-top-item">
                            <div class="slide-inner">
                                <img src="{{ asset('product_images/'.$data->product_image) }}" alt="product">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
            <div class="row mt-40-60-80">
                <div class="col-lg-8">
                    <div class="product-details-content">
                        <div class="product-details-header">
                            <h2 class="title">{{$data->product_name}}</h2>
                            <ul>
                                <li>Listing ID: 14076242</li>
                                <li>Item #: 7300-3356862</li> 
                                
                            </ul>
                        </div>
                        <ul class="price-table mb-30">
                            <li class="header">
                                <h5 class="current">Current Price</h5>
                                <h3 class="price">INR{{$data->product_price}}</h3>
                            </li>
                            <li>
                                <span class="details">Buyer's Premium</span>
                                <h5 class="info">10.00%</h5>
                            </li>
                            <li>
                                <span class="details">Bid Increment (US)</span>
                                <h5 class="info">$50.00</h5>
                            </li>
                        </ul>
                        <div class="product-bid-area">
                            <form class="product-bid-form">
                                <div class="search-icon">
                                    <img src="{{asset('auction/assets/images/product/search-icon.png')}}" alt="product">
                                </div>
                                {{-- <a href="{{route('users.productbid',$data->id)}}"> --}}
                                {{-- <button type="submit" class="custom-button">Submit a bid</button>
                                </a>
                            </form>
                        </div>
                        <div class="buy-now-area">
                            <a href="#0" class="custom-button">Buy Now: {{$data->product_price}}</a>
                            <a href="#0" class="rating custom-button active border"><i class="fas fa-star"></i> Add to Wishlist</a>
                            <div class="share-area">
                                <span>Share to:</span>
                                <ul>
                                    <li>
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-sidebar-area">
                        <div class="product-single-sidebar mb-3">
                            <h6 class="title">This Auction Ends in:</h6>
                            <div class="countdown">
                                <div id="bid_counter1"></div>
                            </div>
                            <div class="side-counter-area">
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{asset('auction/assets/images/product/icon1.png')}}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">61</span></h3>
                                        <p>Active Bidders</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{asset('auction/assets/images/product/icon2.png')}}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">203</span></h3>
                                        <p>Watching</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{asset('auction/assets/images/product/icon3.png')}}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">82</span></h3>
                                        <p>Total Bids</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}} 

    <!--============= About Section Ends Here =============-->
    <div class="bidding-container">
        <!-- Left Side: Bidding Table -->
        <div class="bidding-table">
            <h3>Current Bids</h3>
            <table>
                <tr>
                    <th>Bidder</th>
                    <th>Amount</th>
                    <th>Time</th>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>$150</td>
                    <td>2 min ago</td>
                </tr>
               
            </table>
    
            <!-- Bid Form -->
            {{-- {{ route('place_bid') }} --}}
            <h3>Place Your Bid</h3>
            <form action="{{route('place_bid')}}" method="POST">
                @csrf
                <input type="number" name="bid_amount" 
                       placeholder="Enter your bid" 
                       required 
                       min="{{ $data->current_bid + 950 }}" 
                       step="950">
                <button type="submit">Place Bid</button>
            </form>
        </div>
    
        <!-- Right Side: Product Image -->
        <div class="product-image">
            <img src="{{ asset('product_images/'.$data->product_image) }}" alt="product">
            <h4>{{ $data->product_name }}</h4>
            <p>Starting Bid: ${{ $data->product_price }}</p>
        </div>
    </div>
    



    

@endsection