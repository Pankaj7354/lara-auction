@extends('users.layouts.main')
@section('register')

    <main>
        <!--============= Hero Section Starts Here =============-->
    <div class="hero-section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Sign Up</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('auction/assets/images/banner/hero-bg.png')}}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->
    <!--============= Account Section Starts Here =============-->
<section class="account-section padding-bottom">
    <div class="container">
        <div class="account-wrapper mt--100 mt-lg--440">
            <div class="left-side">
                <div class="section-header" data-aos="zoom-out-down" data-aos-duration="1200">
                    <h2 class="title">HI, THERE</h2>
                    <p>You can log in to your Sbidu account here.</p>
                </div>
                <ul class="login-with">
                    <li>
                        <a href="#0"><i class="fab fa-facebook"></i>Log in with Facebook</a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-google-plus"></i>Log in with Google</a>
                    </li>
                </ul>
                <div class="or">
                    <span>Or</span>
                </div>
                <form action="{{route('register')}}" method="POST" class="login-form">
                    @csrf
                    <div class="form-group mb-30">
                        <label for="email">
                            <i class="far fa-envelope"></i>
                        </label>
                        <input id="email" class="form-control" type="email"
                        name='email' placeholder="Email Address">
                    </div>
                    <span class='text-danger'>{{$errors->first('email')}}</span>

                    <div class="form-group mb-30">
                        <label for="login-pass"><i class="fas fa-lock"></i></label>
                        <input type="password" name="password" placeholder="Password">
                        <span class="pass-type"><i class="fas fa-eye"></i></span>
                    </div>
                    <span class='text-danger'>{{$errors->first('password')}}</span>

                    <div class="form-group mb-30">
                        <label for="login-pass"><i class="fas fa-lock"></i></label>
                        <input type="password" name="password-confirm" placeholder="Re-Password">
                        <span class="pass-type"><i class="fas fa-eye"></i></span>
                    </div>
                    <span class='text-danger'>{{$errors->first('password-comfirm')}}</span>
                    <div class="form-group mt-3 mb-3">
                        <a href="#0">Forgot Password?</a>
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="custom-button">LOG IN</button>
                    </div>
                </form>
            </div>
            <div class="right-side cl-white">
                <div class="section-header mb-0">
                    <h3 class="title mt-0">NEW HERE?</h3>
                    <p>Sign up and create your Account</p>
                    <a href="{{route('login')}}" class="custom-button transparent">LogIn</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--============= Account Section Ends Here =============-->
    </main>
@endsection