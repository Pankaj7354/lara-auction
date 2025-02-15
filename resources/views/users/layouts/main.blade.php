

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

     {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.0.1/luxon.min.js"></script> --}}
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
                                <span class="ml-2 d-none d-sm-inline-block">Customer Support</span>
                            </a>
                        </li>
                        <li class="customer-support-lang d-flex" >
                            <i class="fas fa-globe"></i>
                            <select name="language" class="select-bar">
                                <option value="en">En</option>
                                <option value="bn">Bn</option>
                                <option value="rs">Rs</option>
                                <option value="us">Us</option>
                                <option value="pk">Pk</option>
                                <option value="arg">Arg</option>
                            </select>
                        </li>
                    </ul>
                    <ul class="cart-button-area">
                        <li>
                            <a href="#0" class="cart-button">
                                <i class="flaticon-shopping-basket"></i>
                                <span class="amount">08</span>
                            </a>
                        </li>
                        @guest  <!-- If the user is not logged in -->
                            <li>
                                <a href="{{ route('login') }}" class="user-button">
                                    <i class="flaticon-user"></i>
                                </a>
                            </li>
                        @else  <!-- If the user is logged in -->
                            <li>
                                <a href="{{ route('user_deshbord') }}" class="user-button">
                                    <i class="flaticon-user"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                   class="user-button">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
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
                        </li>
                        <li>
                            <a href="#">Auction</a>
                        </li>
                        <li>
                            <a href="#" >Deshbord</a>
                            <ul class="submenu">
                                <li>
                                    <a href="#0">My Account</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{{route('register')}}">Sign Up</a>
                                        </li>
                                        <li>
                                            <a href="{{route('login')}}">Sign In</a>
                                        </li>
                                    </ul>
                                </li>
                                @if(Auth::check())  
                                <li>
                                    @if(Auth::user()->role == 'admin')  
                                        <a href="{{ route('admin_deshbord') }}">Admin Dashboard</a>
                                    @else
                                        <a href="{{ route('user_deshbord') }}">User Dashboard</a>
                                    @endif
                            
                                    <ul class="submenu">
                                        <li><a href="{{route('admin_deshbord')}}">Dashboard</a></li>
                                        <li><a href="profile.html">Personal Profile</a></li>
                                        <li><a href="my-bid.html">My Bids</a></li>
                                        <li><a href="winning-bids.html">Winning Bids</a></li>
                                        <li><a href="notifications.html">My Alert</a></li>
                                        <li><a href="my-favorites.html">My Favorites</a></li>
                                        <li><a href="referral.html">Referrals</a></li>
                                    </ul>
                                </li>
                            @endif
                            

                            </ul>
                        </li>
                        <li>
                            <a href="0">Product's</a>
                            
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

@yield('content')
@yield('login')
@yield('register')
@yield('user_deshbord')
@yield('productid')
@yield('productDetail')
@yield('Bid')

{{-- @include('users.layouts.footer') --}}
<footer class="bg_img padding-top oh" data-background="{{asset('auction/assets/images/footer/footer-bg.jpg')}}">
    <div class="footer-top-shape">
        <img src="{{asset('auction/assets/css/img/footer-top-shape.png')}}" alt="css">
    </div>
    <div class="anime-wrapper">
        <div class="anime-1 plus-anime">
            <img src="{{asset('auction/assets/images/footer/p1.png')}}" alt="footer">
        </div>
        <div class="anime-2 plus-anime">
            <img src="{{asset('auction/assets/images/footer/p2.png')}}" alt="footer">
        </div>
        <div class="anime-3 plus-anime">
            <img src="{{asset('auction/assets/images/footer/p3.png')}}" alt="footer">
        </div>
        <div class="anime-5 zigzag">
            <img src="{{asset('auction/assets/images/footer/c2.png')}}" alt="footer">
        </div>
        <div class="anime-6 zigzag">
            <img src="{{asset('auction/assets/images/footer/c3.png')}}" alt="footer">
        </div>
        <div class="anime-7 zigzag">
            <img src="{{asset('auction/assets/images/footer/c4.png')}}" alt="footer">
        </div>
    </div>
    <div class="newslater-wrapper">
        <div class="container">
            <div class="newslater-area">
                <div class="newslater-thumb">
                    <img src="{{asset('auction/assets/images/footer/newslater.png')}}" alt="footer">
                </div>
                <div class="newslater-content">
                    <div class="section-header left-style mb-low" data-aos="fade-down"
                     data-aos-duration="1100">
                        <h5 class="cate">Subscribe to Sbidu</h5>
                        <h3 class="title">To Get Exclusive Benefits</h3>
                    </div>
                    <form class="subscribe-form">
                        <input type="text" placeholder="Enter Your Email" name="email">
                        <button type="submit" class="custom-button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top padding-bottom padding-top">
        <div class="container">
            <div class="row mb--60">
                <div class="col-sm-6 col-lg-3" data-aos="fade-down" data-aos-duration="1000">
                    <div class="footer-widget widget-links">
                        <h5 class="title">Auction Categories</h5>
                        <ul class="links-list">
                            <li>
                                <a href="#0">Ending Now</a>
                            </li>
                            <li>
                                <a href="#0">Vehicles</a>
                            </li>
                            <li>
                                <a href="#0">Watches</a>
                            </li>
                            <li>
                                <a href="#0">Electronics</a>
                            </li>
                            <li>
                                <a href="#0">Real Estate</a>
                            </li>
                            <li>
                                <a href="#0">Jewelry</a>
                            </li>
                            <li>
                                <a href="#0">Art</a>
                            </li>
                            <li>
                                <a href="#0">Sports & Outdoor</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-down" data-aos-duration="1300">
                    <div class="footer-widget widget-links">
                        <h5 class="title">About Us</h5>
                        <ul class="links-list">
                            <li>
                                <a href="#0">About Sbidu</a>
                            </li>
                            <li>
                                <a href="#0">Help</a>
                            </li>
                            <li>
                                <a href="#0">Affiliates</a>
                            </li>
                            <li>
                                <a href="#0">Jobs</a>
                            </li>
                            <li>
                                <a href="#0">Press</a>
                            </li>
                            <li>
                                <a href="#0">Our blog</a>
                            </li>
                            <li>
                                <a href="#0">Collectors' portal</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-down" data-aos-duration="1600">
                    <div class="footer-widget widget-links">
                        <h5 class="title">We're Here to Help</h5>
                        <ul class="links-list">
                            <li>
                                <a href="#0">Your Account</a>
                            </li>
                            <li>
                                <a href="#0">Safe and Secure</a>
                            </li>
                            <li>
                                <a href="#0">Shipping Information</a>
                            </li>
                            <li>
                                <a href="#0">Contact Us</a>
                            </li>
                            <li>
                                <a href="#0">Help & FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-down" data-aos-duration="1800">
                    <div class="footer-widget widget-follow">
                        <h5 class="title">Follow Us</h5>
                        <ul class="links-list">
                            <li>
                                <a href="#0"><i class="fas fa-phone-alt"></i>(646) 663-4575</a>
                            </li>
                            <li>
                                <a href="#0"><i class="fas fa-blender-phone"></i>(646) 968-0608</a>
                            </li>
                            <li>
                                <a href="#0"><i class="fas fa-envelope-open-text">
                                    </i><span class="__cf_email__" 
                                    data-cfemail="c4aca1a8b484a1aaa3abb0aca1a9a1eaa7aba9">
                                    [email&#160;protected]</span></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fas fa-location-arrow"></i>1201 Broadway Suite</a>
                            </li>
                        </ul>
                        <ul class="social-icons">
                            <li>
                                <a href="#0" class="active"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright-area">
                <div class="footer-bottom-wrapper">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('auction/assets/images/logo/footer-logo.png')}}" alt="logo"></a>
                    </div>
                    <ul class="gateway-area">
                        <li>
                            <a href="#0"><img src="{{asset('auction/assets/images/footer/paypal.png')}}" alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src="{{asset('auction/assets/images/footer/visa.png')}}" alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src="{{asset('auction/assets/images/footer/discover.png')}}" alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src="{{asset('auction/assets/images/footer/mastercard.png')}}" alt="footer"></a>
                        </li>
                    </ul>
                    <div class="copyright"><p>&copy; Copyright 2024 | <a href="#0">Sbidu</a> By <a href="#0">Uiaxis</a></p></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--============= Footer Section Ends Here =============-->



<!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">

</script> -->
<script src="{{asset('auction/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('auction/assets/js/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('auction/assets/js/plugins.js')}}"></script>
<script src="{{asset('auction/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('auction/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('auction/assets/js/aos.js')}}"></script>
<script src="{{asset('auction/assets/js/wow.min.js')}}"></script>
<script src="{{asset('auction/assets/js/waypoints.js')}}"></script>
<script src="{{asset('auction/assets/js/nice-select.js')}}"></script>
<script src="{{asset('auction/assets/js/counterup.min.js')}}"></script>
<script src="{{asset('auction/assets/js/owl.min.js')}}"></script>
<script src="{{asset('auction/assets/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('auction/assets/js/yscountdown.min.js')}}"></script>
<script src="{{asset('auction/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('auction/assets/js/main.js')}}"></script>
</body>


<!-- Mirrored from pixner.net/sbidu/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jan 2025 04:55:08 GMT -->
</html>