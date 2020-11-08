<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>CRM Admin Panel</title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{ asset('public/component/dashboard') }}/dist/img/ico/favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="{{ asset('public/component/dashboard') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="{{ asset('public/component/dashboard') }}/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="{{ asset('public/component/dashboard') }}/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="container-center" style="margin: 2% auto 0;">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Change Password</h3>
                                <small><strong>Please enter your credentials.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('dashboard.inc.message')
                        <form action="{{ route('reset.password') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Current Password</label>
                                <input type="password" placeholder="Enter current passwore" title="Please enter you current passwore" required="" name="current_password" id="current_password" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">New Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Confirm Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password_confirmation" id="password_confirmation" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <div>
                                <a class="btn btn-warning" href="{{ route('login') }}">Login</a>
                                <button type="submit" class="btn btn-add">Submit</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="{{ asset('public/component/dashboard') }}/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('public/component/dashboard') }}/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
