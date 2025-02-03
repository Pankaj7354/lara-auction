

@extends('users.layouts.main')


@section('title','Product')
@section('productid')
     <!--============= Hero Section Starts Here =============-->
     <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    
                    <span></span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('auction/assets/images/banner/hero-bg.png')}}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Featured Auction Section Starts Here =============-->
    <section class="featured-auction-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="section-header cl-white mw-100 left-style">
                <h3 class="title">Bid on These Featured Auctions!</h3>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach($data as $item)
                <div class="col-sm-10 col-md-6 col-lg-4">

                    <div class="auction-item-2" data-aos="zoom-out-up" data-aos-duration="1000">

                        <div class="auction-thumb">
                            <a href="{{route('users.product',$item->id)}}">
                                <img src="{{asset('product_images/'.$item->product_image)}}" 
                                alt="car"></a>
                            <a href="{{route('users.product',$item->id)}}" class="rating"><i class="far fa-star"></i></a>
                            <a href="{{route('users.product',$item->id)}}" class="bid"><i class="flaticon-auction"></i></a>
                                
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="{{route('users.product',$item->id)}}">
                                    {{$item->product_name}}</a>
                            </h6>
                            <div class="bid-area">
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">${{$item->product_price}}</div>
                                    </div>
                                </div>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-money"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Buy Now</div>
                                        <div class="amount">${{$item->product_price}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown-area">
                                <div class="countdown">
                                    <div id="bid_counter26"></div>
                                </div>
                                <span class="total-bids">30 Bids</span>
                            </div>
                            <div class="text-center">
                                <a href="{{route('users.product',$item->id)}}" class="custom-button">Product Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if($loop->iteration == 3)
                @break
                @endif
              @endforeach
                
            </div>
        </div>
    </section>
    
    
    <!--============= Featured Auction Section Ends Here =============-->


    <!--============= Product Auction Section Starts Here =============-->
    <div class="product-auction padding-bottom">
        <div class="container">
            <div class="product-header mb-40">
                <div class="product-header-item">
                    <div class="item">Sort By : </div>
                    <select name="sort-by" class="select-bar">
                        <option value="all">All</option>
                        <option value="name">Name</option>
                        <option value="date">Date</option>
                        <option value="type">Type</option>
                        <option value="car">Car</option>
                    </select>
                </div>
                <div class="product-header-item">
                    <div class="item">Show : </div>
                    <select name="sort-by" class="select-bar">
                        <option value="09">09</option>
                        <option value="21">21</option>
                        <option value="30">30</option>
                        <option value="39">39</option>
                        <option value="60">60</option>
                    </select>
                </div>
                <form class="product-search ml-auto">
                    <input type="text" placeholder="Item Name">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="row mb-30-none justify-content-center">
                @foreach($data as $item)
                
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="auction-item-2" data-aos="zoom-out-up" data-aos-duration="1000">
                        <div class="auction-thumb">

                            <a href="{{route('users.product',$item->id)}}">
                                <img src="{{asset('product_images/'.$item->product_image)}}" alt="product"></a>
                            <a href="{{route('users.product',$item->id)}}" class="rating"><i class="far fa-star"></i></a>
                            <a href="{{route('users.product',$item->id)}}" class="bid"><i class="flaticon-auction"></i></a>
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="{{route('users.product',$item->id)}}">{{$item->product_name}}</a>
                            </h6>
                            <div class="bid-area">
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">${{$item->product_price}}</div>
                                    </div>
                                </div>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-money"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Buy Now</div>
                                        <div class="amount">${{$item->product_price}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown-area">
                                <div class="countdown">
                                    <div id="bid_counter1"></div>
                                </div>
                                <span class="total-bids">30 Bids</span>
                            </div>
                            <div class="text-center">
                                <a href="{{route('users.product',$item->id)}}" class="custom-button">Submit a bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if($loop->iteration == 4)
                @break
                @endif
                @endforeach

            </div>
            <ul class="pagination">
                <li>
                    <a href="#0"><i class="flaticon-left-arrow"></i></a>
                </li>
                <li>
                    <a href="#0">1</a>
                </li>
                <li>
                    <a href="#0" class="active">2</a>
                </li>
                <li>
                    <a href="#0">3</a>
                </li>
                <li>
                    <a href="#0"><i class="flaticon-right-arrow"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!--============= Product Auction Section Ends Here =============-->

@endsection