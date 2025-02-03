<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/sbidu/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jan 2025 04:53:48 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('auction/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/owl.min.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('auction/assets/css/main.css')}}">

    <link rel="shortcut icon" href="{{asset('auction/assets/images/favicon.png')}}"
     type="image/x-icon">

     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.0.1/luxon.min.js"></script>
</head>

<body>
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->


    <!--============= Header Section Starts Here =============-->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="customer-support">
                        <li class="cmn-support-text">
                            <a href="#0" class="mr-3">
                                <i class="fas fa-phone-alt"></i>
                                <span class="ml-2 d-none d-sm-inline-block">
                                    Customer Support
                                </span>
                            </a>
                        </li>
                        <li class="customer-cupport-lang">
                            <i class="fas fa-globe"></i>
                            <select name="language" class="select-bar">
                                <option value="en">En</option>
                                <option value="Bn">Bn</option>
                                <option value="Rs">Rs</option>
                                <option value="Us">Us</option>
                                <option value="Pk">Pk</option>
                                <option value="Arg">Arg</option>
                            </select>
                        </li>
                    </ul>
                    <ul class="cart-button-area">
                        <li>
                            <a href="#0" class="cart-button"><i class="flaticon-shopping-basket">

                            </i>
                                <span class="amount">08</span></a>
                        </li>                        
                        <li>
                            <a href="{{route('login')}}"
                             class="user-button"><i class="flaticon-user">

                            </i>
                            </a>
                        </li>                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{asset('auction/assets/images/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        <li>
                            <a href="{{route('users.index')}}">Home</a>
                            <ul class="submenu">
                                <li>
                                    <a href="index.html">Home Page One</a>
                                </li>
                                <li>
                                    <a href="index-2.html">Home Page Two</a>
                                </li>
                                <li>
                                    <a href="index-3.html">Home Page Three</a>
                                </li>
                                <li>
                                    <a href="index-4.html">Home Page Four</a>
                                </li>
                                <li>
                                    <a href="index-5.html">Home Page Five</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Auction</a>
                        </li>
                        <li>
                            <a href="#0">Pages</a>
                            <ul class="submenu">
                                <li>
                                    <a href="#0">Product</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="product.html">Product Page 1</a>
                                        </li>
                                        <li>
                                            <a href="product-2.html">Product Page 2</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html">Product Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">My Account</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="sign-up.html">Sign Up</a>
                                        </li>
                                        <li>
                                            <a href="sign-in.html">Sign In</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Dashboard</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="dashboard.html">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="profile.html">Personal Profile</a>
                                        </li>
                                        <li>
                                            <a href="my-bid.html">My Bids</a>
                                        </li>
                                        <li>
                                            <a href="winning-bids.html">Winning Bids</a>
                                        </li>
                                        <li>
                                            <a href="notifications.html">My Alert</a>
                                        </li>
                                        <li>
                                            <a href="my-favorites.html">My Favorites</a>
                                        </li>
                                        <li>
                                            <a href="referral.html">Referrals</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li>
                                    <a href="faqs.html">Faqs</a>
                                </li>
                                <li>
                                    <a href="error.html">404 Error</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                    <form class="search-form">
                        <input type="text" placeholder="Search for brand, model....">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="search-bar d-md-none">
                        <a href="#0"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>