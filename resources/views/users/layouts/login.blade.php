
@extends('users.layouts.main')
@section('content')

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
                            Auction
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-image" style="background-image: url({{asset('auction/assets/img/hero-bg.png')}});">

            </div>
        </section>
        <!-- End Breadcrumb -->
        <!-- Login -->
        <section id="login">
            <div class="container">
                <div class="account d-flex">
                    <div class="left-side">
                        <div class="header text-center">
                            <h1>HI, THERE</h1>
                            <p>You can log in to your Sbidu account here.</p>
                        </div>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">
                                    <i class="far fa-envelope"></i>
                                </label>
                                <input name="email" class="form-control" type="text" placeholder="Email Address">
                                <span >
                            </div>
                            <span class='text-danger'>{{$errors->first('email')}}</span>

                            <div class="form-group">
                                <label for="password">
                                    <i class="fas fa-lock"></i>
                                </label>
                                <input name="password" class="form-control" type="password" placeholder="Password">
                                <span class="show-password"><i class="fas fa-eye"></i></span>

                            </div>
                            <span class='text-danger'>{{$errors->first('password')}}</span>
                            <div class="form-group">
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="form-group mb-0 mt-4">
                                <button type="submit">LOG IN</button>
                            </div>
                        </form>
                    </div>
                    <div class="right-side">
                        <div class="sign-up">
                            <h2>NEW HERE?</h2>
                            <p>Sign up and create your Account</p>
                            <a href="sing-up.html">SING UP</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login -->
    </main>

@endsection

   
 