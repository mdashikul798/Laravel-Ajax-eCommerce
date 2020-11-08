@extends('shop.layouts.app')
    @section('content')
    <section class="pages login-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 registration_message">
                    @include('shop.inc.message')
                </div>
                <div class="col-md-12 col-sm-12 registration_area">
                    <div class="col-sm-6">
                        <div class="main-input padding60">
                            <div class="log-title">
                                <h3><strong>registered customers</strong></h3>
                            </div>
                            <div class="login-text">
                                <div class="custom-input">
                                    <p>If you have an account with us, Please log in!</p>
                                    <form action="{{ route('check.user.login') }}" method="POST">
                                        @csrf
                                        <input type="text" name="email" placeholder="Email">
                                        <input type="password" name="password" placeholder="Password">
                                        <a class="forget" href="#">Forget your password?</a>
                                        <div class="submit-text">
                                            <button type="submit" class="btn">login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="main-input padding60 new-customer">
                            <div class="log-title">
                                <h3><strong>new customers</strong></h3>
                            </div>
                            <div class="custom-input">
                                <form action="{{ route('save.user.registration') }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" placeholder="Name here.." value="{{ old('name') }}" required>
                                    <input type="email" name="email" placeholder="Email Address.." value="{{ old('email') }}" required>
                                    <input type="number" name="phone_number" placeholder="Phone Number.." value="{{ old('phone_number') }}">
                                    <input type="password" name="password" placeholder="Password" required>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                    <label class="first-child">
                                        <input type="radio" name="rememberme" value="forever">
                                        Sign up for our newsletter!
                                    </label>
                                    <div class="submit-text coupon">
                                        <button type="submit" class="btn">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
