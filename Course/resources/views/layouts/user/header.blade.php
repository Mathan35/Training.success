<!DOCTYPE html>
<html lang="en">
<head>
	<title>Learn Courses</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/css/styles.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/quill/quill.snow.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/quill/quill.bubble.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/remixicon/remixicon.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/simple-datatables/style.css')}}">
  
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="site-logo">
						<img src="{{asset('assets/img/logo.png')}}" alt="">
					</div>
					<div class="nav-switch">
						<i class="fa fa-bars"></i>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
                    @if (Route::has('login'))
						@auth
							<a href="{{ route('register') }}" class="site-btn h6 header-btn text-decoration-none">{{auth()->user()->name}}</a>

						@else
							@if (Route::has('register'))
								<a href="{{ route('user-register') }}" class="text-decoration-none site-btn h6 header-btn ml-3">Register</a>
							@endif
								<a href="{{ route('login') }}" class=" text-decoration-none site-btn h6 header-btn ">Log in</a>
						@endauth
					@endif

					<nav class="main-menu">
						<ul>
							<li><a class="text-decoration-none" href="{{route('home')}}">Home</a></li>
							<li><a class="text-decoration-none"  href="{{route('view-enquiry')}}">Enquiries</a></li>
							<li><a class="text-decoration-none"  href="user/profile">Profile</a></li>
							<li><a class="text-decoration-none"  href="blog.html">
                                @auth
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn border-none bg-none text-light" type="submit"><i class="bi bi-box-arrow-right"></i> {{ __('Log Out') }}</button>
                              </form>
                              @endauth
                            </a></li>
                             <!-- Authentication -->
                
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Hero section -->
	@if (App\Models\Setting::find(1)->background_image == null)
	<section class="hero-section set-bg" data-setbg="{{asset('assets/img/bg.jpg')}}">
	@else
	<section class="hero-section set-bg" data-setbg="{{asset('assets/images/'.App\Models\Setting::find(1)->background_image)}}">
	@endif
			<div class="container">
			<div class="hero-text text-white">
				<h2>{{App\Models\Setting::find(1)->background_title == null? "Get The Best Free Online Courses":App\Models\Setting::find(1)->background_title}}</h2>
				<p>{{App\Models\Setting::find(1)->background_description == null? "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla <br> dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.":App\Models\Setting::find(1)->background_description}}</p>
			</div>
			<div class="row">
				<div class="col-lg-9 offset-lg-3">
					<form class="intro-newslatter">
						<input type="text" placeholder="Course...">
						<button class="site-btn">Search</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

    @yield('content')
   
	<!-- footer section -->
	<footer class="footer-section  pb-0">
		<div class="footer-bottom">
			<div class="footer-warp">
				<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
			</div>
		</div>
	</footer> 
	<!-- footer section end -->


	<!--====== Javascripts & Jquery ======-->
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/mixitup.min.j')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
	<!-- Vendor JS Files -->
	<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
	<script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
	<script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
	<script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
	<script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
	<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

</html>