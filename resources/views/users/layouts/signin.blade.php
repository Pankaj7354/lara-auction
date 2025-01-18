<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sbidu - Bid And Auction HTML Template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('auction/assets/font/flaticon.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('auction/assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('auction/assets/img/favicon-logo.png')}}" type="image/x-icon">

    <script src="https://kit.fontawesome.com/5f8f97e3fd.js" crossorigin="anonymous"></script>
</head>

<body>

    <section id="loader">
        <div class="img-loader">
        </div>
    </section>

    <header>
        <div class="header-top">
            <div class="container">
                <div class="content d-flex justify-content-between align-items-center">
                    <ul class="d-flex">
                        <li>
                            <a href="#" class="mr-3">
                                <i class="fas fa-phone-alt"></i>
                                <span>Customer Support</span>
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-globe"></i>
                            <select name="language" class="select-bar">
                                <option value="en">En</option>
                                <option value="az">Az</option>
                                <option value="ru">Ru</option>
                            </select>
                        </li>
                    </ul>
                    <div class="my-account d-flex align-items-center">
                        <a href="sing-in.html" class="login">Login</a>
                        <a href="my-account-bids.html" class="user">
                            <i class="flaticon-user"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar -->
        <div class="header-bottom">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div class="logo">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('auction/assets/img/logo.png')}}" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars navbar-toggler-icon"></i>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="auction.html">Auction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about-us.html">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>

                    </div>
                    <div class="search-nav">
                        <span class="icon">
                            <i class="fas fa-search"></i>
                        </span>
                        <form class="search-form my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search"
                             placeholder="Search for brand, model...."
                                aria-label="Search">
                            <button class="btn-search my-2 my-sm-0" type="submit">
                                <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <!-- End Navbar -->
    </header>

    <main>
        <!-- Breadcrumb -->
        <section id="breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="index.html">
                            Home
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            SIGN UP
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-image" style="background-image: url({{asset('auction/assets/img/hero-bg.png')}});">

            </div>
        </section>
        <!-- End Breadcrumb -->
        <!-- Login -->
        <section id="register">
            <div class="container">
                <div class="account d-flex">
                    <div class="left-side">
                        <div class="header text-center">
                            <h1>SIGN UP</h1>
                            <p>We're happy you're here!</p>
                        </div>
                        <form action="#">
                            @csrf
                            <div class="form-group">
                                <label for="name">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                </label>
                                <input  class="form-control" type="text"
                                name='email' placeholder="Enter Your Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    <i class="far fa-envelope"></i>
                                </label>
                                <input id="email" class="form-control" type="text"
                                name='email' placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label for="password">
                                    <i class="fas fa-lock"></i>
                                </label>
                                <input id="password" class="form-control" type="password" placeholder="Password">
                                <span class="show-password"><i class="fas fa-eye"></i></span>
                            </div>
                            <div class="form-group">
                                <label for="password-comfirm">
                                    <i class="fas fa-lock"></i>
                                </label>
                                <input id="password-comfirm" class="form-control" type="password" placeholder="Re-Password">
                            </div>
                            <div class="form-group mb-0 mt-4">
                                <button type="submit">REGISTER</button>
                            </div>
                        </form>
                    </div>
                    <div class="right-side">
                        <div class="sign-up">
                            <h2>ALREADY HAVE AN ACCOUNT?</h2>
                            <p>Log in and go to your Dashboard.</p>
                            <a href="sing-in.html">LOGIN</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login -->
    </main>

    <footer style="background-image: url({{asset('auction/assets/img/footer-bg.jpg')}});">
        <div class="footer-bg">
            <img src="{{asset('auction/assets/img/footer-top-shape.png')}}" class="img-fluid" alt="">
        </div>
        <div class="subscribe">
            <div class="container area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image">
                            <img src="{{asset('auction/assets/img/newslater.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <div class="title">
                                <h4>Subscribe to Sbidu</h4>
                                <h2>To Get Exclusive Benefits</h2>
                            </div>
                            <form action="#">
                                <input type="text" placeholder="Enter Your Email">
                                <button type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="item">
                            <h4>
                                Auction Categories
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Ending Now</a>
                                </li>
                                <li>
                                    <a href="#">Vehicles</a>
                                </li>
                                <li>
                                    <a href="#">Watches</a>
                                </li>
                                <li>
                                    <a href="#">Electronics</a>
                                </li>
                                <li>
                                    <a href="#">Real Estate </a>
                                </li>
                                <li>
                                    <a href="#">Jewelry</a>
                                </li>
                                <li>
                                    <a href="#">Art</a>
                                </li>
                                <li>
                                    <a href="#">Sports & Outdoor</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item">
                            <h4>
                                About Us
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">About Sbidu</a>
                                </li>
                                <li>
                                    <a href="#">Help</a>
                                </li>
                                <li>
                                    <a href="#">Affiliates</a>
                                </li>
                                <li>
                                    <a href="#">Jobs</a>
                                </li>
                                <li>
                                    <a href="#">Press</a>
                                </li>
                                <li>
                                    <a href="#">Our blog</a>
                                </li>
                                <li>
                                    <a href="#">Collectors' portal</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item">
                            <h4>
                                We're Here to Help
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Your Account</a>
                                </li>
                                <li>
                                    <a href="#">Safe and Secure</a>
                                </li>
                                <li>
                                    <a href="#">Shipping Information</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Help & FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item">
                            <h4>
                                Follow Us
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-phone-alt"></i>
                                        (646) 663-4575
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-blender-phone"></i>
                                        (646) 968-0608
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-envelope-open-text"></i>
                                        help@engotheme.com
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-location-arrow"></i>
                                        1201 Broadway Suite
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright">
                    <img src="{{asset('auction/assets/img/logo.png')}}" class="logo" alt="">
                    <ul class="d-flex"> 
                        <li>
                            <img src="{{asset('auction/assets/img/paypal.png')}}" alt="">
                        </li>
                        <li>
                            <img src="{{asset('auction/assets/img/visa.png')}}" alt="">
                        </li>
                        <li>
                            <img src="{{asset('auction/assets/img/discover.png')}}" alt="">
                        </li>
                        <li>
                            <img src="{{asset('auction/assets/img/mastercard.png')}}" alt="">
                        </li>
                    </ul>
                    <p>
                        © Copyright 2020 | 
                        <a href="#">Sbidu</a>
                        By      
                        <a href="#">Uiaxis</a>
                    </p>
                </div>
            </div>
        </div>
        
    </footer>

    <div class="back-to-top">
        <i class="fas fa-angle-up"></i>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{asset('auction/assets/js/main.js')}}"></script>
</body>

</html>