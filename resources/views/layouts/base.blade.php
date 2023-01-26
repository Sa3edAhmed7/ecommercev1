<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/color-01.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha512-63+XcK3ZAZFBhAVZ4irKWe9eorFG0qYsy2CaM5Z+F3kUn76ukznN0cp4SArgItSbDFD1RrrWgVMBY9C/2ZoURA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js" integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<style>
        ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        border-radius: 50px !important
    }

    ::-webkit-scrollbar-track {
      background: #ffffff
    }
    
    ::-webkit-scrollbar-thumb {
      background: #ff2832
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: #555
    }
    </style>
	
    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: {{ $setting->phone }}</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								<li class="menu-item lang-menu menu-item-has-children parent">
									<a title="English" href="#"><span class="img label-before"><img src="{{asset('assets')}}/images/lang-en.png" alt="lang-en"></span>English</a>
								</li>
								@if(Route::has('login'))
								@auth
								@if(Auth::user()->utype === 'SADM')
									<li class="menu-item menu-item-has-children parent" >
										<a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class="submenu curency" >
											<li class="menu-item" >
												<a title="Dashboard" href="{{ route('admin.dashboard') }}">Dashboard</a>
											</li>
											<li class="menu-item">
												<a title="My Profile" href="{{ route('admin.profile') }}">My Profile</a>
											</li>
											<li class="menu-item">
											<a title="Categories" href="{{ route('admin.categories') }}">Categories</a>
											</li>
											<li class="menu-item">
											<a title="Attributes" href="{{ route('admin.attributes') }}">Attributes</a>
											</li>
											<li class="menu-item">
											<a title="Products" href="{{ route('admin.products') }}">Products</a>
											</li>
											<li class="menu-item">
											<a title="Pages" href="{{ route('admin.pages') }}">Pages</a>
											</li>
											<li class="menu-item">
												<a title="HomeSilder" href="{{ route('admin.homeslider') }}">Manage Home Silder</a>
											</li>
											<li class="menu-item">
												<a title="Manage Home Categories" href="{{ route('admin.homecategories') }}">Manage Home Categories</a>
											</li>
											<li class="menu-item">
												<a title="Sale Setting" href="{{ route('admin.sale') }}">Sale Setting</a>
											</li>

											<li class="menu-item">
												<a title="All Coupon" href="{{ route('admin.coupons') }}">All Coupon</a>
											</li>

											<li class="menu-item">
												<a title="All Order" href="{{ route('admin.orders') }}">All Orders</a>
											</li>
											<li class="menu-item">
												<a title="Contact Messages" href="{{ route('admin.contact') }}">Contact Messages</a>
											</li>

											<li class="menu-item">
												<a title="Settings" href="{{ route('admin.settings') }}">Settings</a>
											</li>

											<li class="menu-item">
												<a title="Change Pasword" href="{{ route('admin.changepassword') }}">Change Pasword</a>
											</li>

											<li class="menu-item">
												<a title="All Users" href="{{ route('admin.users') }}">All Users</a>
											</li>

											<li class="menu-item">
												<a title="AboutPayment" href="{{ route('admin.aboutpayment') }}">AboutPayment</a>
											</li>

											<li class="menu-item">
												<a title="Links App" href="{{ route('admin.linkapp') }}">Links App</a>
											</li>

											<form method="POST" action="{{ route('logout') }}">
                                    		@csrf
											<li class="menu-item" >
                                    		<a href="{{ route('logout') }}"onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                			</li>
										</form>
										</ul>
									</li>
									@elseif(Auth::user()->utype === 'ADM')
									<li class="menu-item menu-item-has-children parent" >
										<a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class="submenu curency" >
											<li class="menu-item" >
												<a title="Dashboard" href="{{ route('admin.dashboard') }}">Dashboard</a>
											</li>
											<li class="menu-item">
												<a title="My Profile" href="{{ route('admin.profile') }}">My Profile</a>
											</li>

											<form method="POST" action="{{ route('logout') }}">
                                    		@csrf
											<li class="menu-item" >
                                    		<a href="{{ route('logout') }}"onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                			</li>
										</form>
										</ul>
									</li>
								@else
									<li class="menu-item menu-item-has-children parent" >
											<a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="submenu curency" >
												<li class="menu-item" >
													<a title="Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
												</li>
												<li class="menu-item">
												<a title="My Orders" href="{{ route('user.orders') }}">My Orders</a>
											</li>
											<li class="menu-item">
												<a title="Change Pasword" href="{{ route('user.changepassword') }}">Change Pasword</a>
											</li>
												<form method="POST" action="{{ route('logout') }}">
                                    		@csrf
											<li class="menu-item" >
                                    		<a href="{{ route('logout') }}"onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                			</li>
										</form>
											</ul>
										</li>
								@endif
								@else
								<li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
								<li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">Register</a></li>
								@endif
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{asset('assets')}}/images/logo-top-2.png" alt="mercado"></a>
						</div>

						
						
						@livewire('header-search-component')
						<div class="wrap-icon right-section">
						@livewire('wishlist-count-component')
						@livewire('cart-count-component')

					</div>
				</div>
				@livewire('header-component')
			</div>
		</div>
	</header>

    {{$slot}}
	
	@livewire('footer-component')
	
	<script src="{{asset('assets')}}/js/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{asset('assets')}}/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.flexslider.js"></script>
	<script src="{{asset('assets')}}/js/jquery.flexslider-min.js"></script>
	<script src="{{asset('assets')}}/js/chosen.jquery.min.js"></script>
	<script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.countdown.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.sticky.js"></script>
	<script src="{{asset('assets')}}/js/functions.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js" integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @livewireScripts

	@stack('scripts')
</body>
</html>