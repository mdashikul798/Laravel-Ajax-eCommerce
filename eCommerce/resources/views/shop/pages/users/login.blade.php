@extends('shop.layouts.app')
    @section('content')
    <section class="pages login-page section-padding">
        <div class="col-md-6 registration_message">
            @include('shop.inc.message')
        </div>
        <div class="container">
            <div class="col-sm-6 col-md-6 login_form">
                <div class="main-input padding60">
                    <div class="log-title">
                        <h3><strong>Enter your credential</strong></h3>
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
        </div>
    </section>
    @endsection
