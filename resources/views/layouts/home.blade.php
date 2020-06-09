<?php
 use App\Setting;
 $settings = Setting::find(1); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ config('app.name', 'UAFCR') }} : {{ $title}} </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="{{ $settings->seo_desc }}" />
		<meta name="keywords" content="{{ $settings->seo_keywords }}" />
		<meta name="author" content="UAFCR IT Team" />

	  	<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<link rel="shortcut icon" type="image/x-icon" href="{{ $settings->favicon }}">

		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700" rel="stylesheet"
		>
		
		<!-- Animate.css -->
		<link rel="stylesheet" href="{{ asset('website/css/animate.css') }}">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="{{ asset('website/css/icomoon.css') }}">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="{{ asset('website/css/bootstrap.css') }}">

		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}">

		<!-- Flexslider  -->
		<link rel="stylesheet" href="{{ asset('website/css/flexslider.css') }}">

		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('website/css/owl.theme.default.min.css') }}">

		<!-- Theme style  -->
		<link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
		<!-- Lightbox css -->
		<link href="{{ asset('website/bootstrap-lightbox/css/lightbox.css') }}" rel="stylesheet">
		<!-- Modernizr JS -->
		<script src="{{ asset('website/js/modernizr-2.6.2.min.js') }}"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<style>
			#myList .col-md-4{ display:none;
			}
			#myList .col-md-3{ display:none;
			}
		</style>

	</head>
	<body> 
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container-wrap">
				<div class="container-fluid" style="background-color: #597DC5;">
					<div class="row justify-content-between m-3">
						<div class="today-date text-xl-center">
							<span class="date">Today is Sunday  31/May/2020</span>
						</div>
						<div class="float-right">
							<a href="{{ $settings->facebook_url }}" style="color: #000;"><i class="icon-facebook2"></i></a>
							<a href="{{ $settings->twitter_url }}" style="color: #000;"><i class="icon-twitter2"></i></a>
							<a href="{{ $settings->youtube_url }}" style="color: #000;"><i class="icon-youtube"></i></a>
						</div>
					</div>
				</div>
				
				<div class="top-menu">
					<div class="row">
						<div class="col-md-12 text-center p-0">
							<div id="fh5co-logo"><a href="{{ config('app.url') }}">
								<img src="../logo.png">
							</a></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 offset-md-0 text-center menu-1">
							<ul>
								<li class="active"><a href="{{ config('app.url') }}">Home</a></li>
								<li class="has-dropdown"/>
									<a href="#">Media</a>
									<ul class="dropdown">
										<li><a href="galleries.php">Galleries</a></li>
										<li><a href="sermons.php">Sermons</a></li>
										<li><a href="events.php">Events</a></li>
										<li><a href="{{ route('news')}}">News</a></li>
										<li><a href="#">Blog</a></li>
									</ul>
								</li>
								<li class=""><a href="{{ route('contact.show')}}">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>	
		@yield('content')
	</div><!-- END container-wrap -->

		<div class="container-wrap">
			<footer id="fh5co-footer" role="contentinfo">
				<div class="row">
			        <div class="col-xs-6 col-sm-6 col-md-3 text-light">
			          <h5>Contact us</h5>
			          <div>
			            <span>Address:</span>
			            <span>Jinja Uganda</span><br>
			            <span>Phone:</span>
			            <span type="tel">+256 780 000 000</span><br>
			            <span>Email:</span> 
			            <span>info@uafcr.org</span>
			          </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-3">
			          <h5>Quick links</h5>
			          <ul class="list-unstyled quick-links">
			            <li><a href="#"><i class="icon-arrow-right3"></i> Home</a></li>
			            <li><a href="#"><i class="icon-arrow-right3"></i> About</a></li>
			            <li><a href="#"><i class="icon-arrow-right3"></i> FAQ</a></li>
			            <li><a href="#"><i class="icon-arrow-right3"></i> Get Started</a></li>
			            <li><a href="#"><i class="icon-arrow-right3"></i> Videos</a></li>
			          </ul>
			        </div>
			        
			        <div class="col-xs-6 col-sm-6 col-md-3">
			          <h5>Other Regions</h5>
			          <ul class="list-unstyled quick-links">
			            <li><a href="#"><i class="icon-arrow-right3"></i>  Kenya</a></li>
			            <li><a href="#"><i class="icon-arrow-right3"></i>  Tanzania</a></li>
			            <li><a href="#"><i class="icon-arrow-right3"></i>  DRC</a></li>
			            <li><a href="#"><i class="icon-arrow-right3"></i>  Rwanda</a></li>
			            <li><a href="#"><i class="icon-arrow-right3"></i>  Others</a></li>
			          </ul>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-3">
			          <h5>Subscribe to Our Newsletter</h5>
			          	<form method="post">
							<div class="form-group">
								<input type="email" name="email" placeholder="Email Address" required class="form-control bg-light">
								<br>
								<input type="submit" name="subscribe" class="container-fluid btn btn-primary" value="Subscribe">
							</div>
						</form>
			        </div>
			      </div>
			      <hr style="border: 1px; border-style: dashed;">
			      <div class="row">
			        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5 text-center">
			          <ul class="fh5co-social-icons">
							<li><a href="{{ $settings->twitter_url }}"><i class="icon-twitter2"></i></a></li>
							<li><a href="{{ $settings->facebook_url }}"><i class="icon-facebook2"></i></a></li>
							<li><a href="{{ $settings->youtube_url }}"><i class="icon-youtube"></i></a></li>
						</ul>
			        </div>
			      </div> 
				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">Copyright &copy; <script>document.write(new Date().getFullYear());</script> {{ $settings->copyright_text }}</small> 
						</p>
					</div>
				</div>
			</footer>
		</div><!-- END container-wrap -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	
	<!-- jQuery -->
	<script src="{{ asset('website/js/jquery.min.js') }}"></script>
	<!-- Lightbox js -->
	<script src="{{ asset('website/bootstrap-lightbox/js/lightbox.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('website/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('website/js/jquery.waypoints.min.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('website/js/jquery.flexslider-min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('website/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('website/js/magnific-popup-options.js') }}"></script>
	<!-- Counters -->
	<script src="{{ asset('website/js/jquery.countTo.js') }}"></script>
	<!-- Main -->
	<script src="{{ asset('website/js/main.js') }}"></script>
	<!-- Load more and load less buttons -->
	<script>
		$(document).ready(function () {
		    size_li = $("#myList .col-md-4").size();
		    x=6;
		    $('#myList .col-md-4:lt('+x+')').show();
		    $('#loadMore').click(function () {
		        x= (x+3 <= size_li) ? x+3 : size_li;
		        $('#myList .col-md-4:lt('+x+')').show();
		    });
		    $('#showLess').click(function () {
		        x=(x-3<0) ? 3 : x-3;
		        $('#myList .col-md-4').not(':lt('+x+')').hide();
		    });
		});
	</script>
	</body>
</html>

