<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction </title>
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
                        <a href="{{route('login')}}" class="login">Login</a>
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
                                data-target="#navbarSupportedContent" 
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars navbar-toggler-icon"></i>
                            </button>
                        </div>
    
                        <div class="collapse navbar-collapse justify-content-end"
                        id="navbarSupportedContent">
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