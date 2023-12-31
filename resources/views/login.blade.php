@extends('layouts')

@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="assets/img/others/breadcrumbs-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Login</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li>// Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <div class="login-register-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('authenticate') }}" method="POST" autocomplete="off">
                        @csrf
                        @method('POST')
                        <div class="login-form">
                            <h4 class="login-title">Login</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Email Address*</label>
                                    <input type="email" placeholder="Email Address" name="email" />
                                </div>
                                <div class="col-lg-12">
                                    <label>Password</label>
                                    <input type="password" placeholder="Password" name="password" />
                                </div>
                                <div class="col-sm-4 pt-1 mt-md-0">
                                    <div class="forgotton-password_info">
                                        <a href="#"> Forgotten pasward?</a>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-5">
                                    <button class="btn custom-btn md-size" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
