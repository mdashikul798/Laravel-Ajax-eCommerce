<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>eCommerce || Sellshop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/component/shop') }}/img/favicon.ico">



        <link rel="apple-touch-icon" href="{{ asset('public/component/shop') }}/apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		<!-- google fonts -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/animate.css">
		<!-- pe-icon-7-stroke -->
		<link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/materialdesignicons.min.css">
		<!-- pe-icon-7-stroke -->
		<link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/jquery.simpleLens.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/meanmenu.min.css">
		<!-- nivo.slider css -->
        <link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/nivo-slider.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/owl.carousel.css">
		<!-- style css -->
		<link rel="stylesheet" href="{{ asset('public/component/shop') }}/style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/responsive.css">
		<!-- modernizr js -->
        <script src="{{ asset('public/component/shop') }}/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- additional css -->
        <link rel="stylesheet" href="{{ asset('public/component/shop') }}/css/additional.css">

        <!-- CSS Sweet-Alert -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.9.0/sweetalert2.min.css" integrity="sha512-N2ad26UcOSDt+8tFePJA4cGTIBB1b+BwD0MnoB8c8stF+jwGLz6qnePWgiX2cTdicpZwlHfp9jKHE34juWK+hg==" crossorigin="anonymous" />
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="{{ asset('public/component/shop') }}/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- header section start -->
		<header class="header-one header-two header-page">
			<div class="header-top-two">
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-12">
							<div class="middel-top">
								<div class="left floatleft">
									<p><i class="mdi mdi-clock"></i> {{ date('D m-M Y') }}</p>
								</div>
							</div>
							<div class="middel-top clearfix">
								<ul class="clearfix right floatright">
									<li>
                                        @if(Session::has('login_user'))
                                        <span class="user-name">{{ Session::get('login_user')->name }}</span>
                                        @endif
										<a href="#"><i class="mdi mdi-account"></i></a>
										<ul>
											<li><a href="{{ route('user.login') }}">Login</a></li>
											<li><a href="{{ route('user.registration') }}">Registar</a></li>
                                            <li><a href="#">My account</a></li>
                                            <li><a href="{{ route('user.logout') }}">LogOut</a></li>
										</ul>
									</li>
								</ul>
								<div class="right floatright">
									<form action="#" method="get">
										<button type="submit"><i class="mdi mdi-magnify"></i></button>
										<input type="text" placeholder="Search within these results..." />
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container text-center">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo">
							<a href="{{ route('home') }}"><img src="{{ asset('public/component/shop') }}/img/logo2.png" alt="Sellshop" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="header-middel">
							<div class="mainmenu">
								<nav>
									<ul>
										<li><a href="{{ route('home') }}">Home</a></li>
										<li><a href="#">Shop</a></li>
										<li><a href="#">Blog</a></li>
										<li><a href="#">About</a></li>
										<li><a href="#">Contact</a></li>
									</ul>
								</nav>
							</div>
							<!-- mobile menu start -->
							<div class="mobile-menu-area">
								<div class="mobile-menu">
									<nav id="dropdown">
										<ul>
											<li><a href="{{ route('home') }}">Home</a>
												<ul class="dropdown">
													<li><a href="#">Home version one</a></li>
													<li><a href="#">Home version two</a></li>
												</ul>
											</li>
											<li><a href="#">Shop</a></li>
											<li><a href="#">Pages</a></li>
											<li><a href="#">Blog</a></li>
											<li><a href="#">About</a></li>
											<li><a href="#">Contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="cart-itmes">
							<a class="cart-itme-a" href="{{ route('product.shoppingCart') }}">
								<i class="mdi mdi-cart"></i>
								{{ Session::has('cart') ? 'Items' : '' }} :  <strong id="totalQuentity"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</strong>
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>
        <!-- header section end -->
