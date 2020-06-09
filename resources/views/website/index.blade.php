@extends('layouts.home')
@section('content')
		<div class="container-wrap">
			@include ('website.components.banners')
			<div id="fh5co-intro">
				<div class="row animate-box">
					<div class="col-md-12 col-md-offset-0 text-center">
						<h2>Welcome to Universal Apostles' Fellowship Church of Righteousness</h2>
						<span>2 Tim 2:15  -  Do your best to win full approval in God's sight ... </span>
					</div>
				</div>
			</div>
			<hr>
			<div id="fh5co-counter" class="fh5co-counters">
				<div class="row">
					<div class="col-md-6 offset-md-3 text-center animate-box">
						<p>Africa popularly known as a dark continent now hosts the one and ony prophet of God, Prophet David in this generation.</p>
						</div>
				</div>
				<!-- <div class="row animate-box">
					<div class="col-md-8 offset-md-2">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-6 text-center">
								<span class="fh5co-counter js-counter" data-from="0" data-to="2352" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Churches</span>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 text-center">
								<span class="fh5co-counter js-counter" data-from="0" data-to="10" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Ministries</span>
							</div>
							<div class="clearfix visible-sm-block visible-xs-block"></div>
							<div class="col-md-3 col-sm-6 col-xs-6 text-center">
								<span class="fh5co-counter js-counter" data-from="0" data-to="34" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Dioceses/Zones</span>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 text-center">
								<span class="fh5co-counter js-counter" data-from="0" data-to="512" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Activities</span>
							</div>
						</div>
					</div>
				</div> -->
			</div>
			<div id="fh5co-services" class="fh5co-light-grey">
				<div class="row animate-box">
					<div class="col-md-6 offset-md-3 text-center fh5co-heading">
						<h2>Core Values</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 animate-box">
						<div class="services">
							<div class="desc">
								<img src="{{ asset('website/images/body-bg.png')}}" class="card-img">
								<h3><a href="{{ route('core-values')}}">Righteousness</a></h3>
								<p>This card contains righteousness as a core value of the church.</p>
								<a href="{{ route('core-values')}}">Read More <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 animate-box">
						<div class="services">
							<div class="desc">
								<img src="{{ asset('website/images/body-bg.png')}}" class="card-img">
								<h3><a href="{{ route('core-values')}}">Marriage</a></h3>
								<p>This card contains marriage as a core value of the church.</p>
								<a href="{{ route('core-values')}}">Read More <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 animate-box">
						<div class="services">
							<div class="desc">
								<img src="{{ asset('website/images/body-bg.png')}}" class="card-img">
								<h3><a href="{{ route('core-values')}}">Court</a></h3>
								<p>This card contains court as a core value of the church.</p>
								<a href="{{ route('core-values')}}">Read More <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 animate-box">
						<div class="services"><!-- 
							<a href="#" class="img-holder"><img class="img-responsive" src="images/img-2.jpg" alt="Free HTML5 Website Template by freehtml5.co"></a> -->
							<div class="desc">
								<img src="{{ asset('website/images/body-bg.png')}}" class="card-img">
								<h3><a href="{{ route('core-values')}}">Service to Jesus</a></h3>
								<p>This card contains service to jesus as a core value of the church.</p>
								<a href="{{ route('core-values')}}">Read More <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="fh5co-bible-verse">
				<div class="overlay"></div>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<div class="row animate-box">
							<div class="owl-carousel owl-carousel-fullwidth">
								<div class="item">
									<div class="bible-verse-slide active text-center">
										<blockquote>
											<p>&ldquo;For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life.&rdquo;</p>
											<span>John 3:16</span>
										</blockquote>
									</div>
								</div>
								<div class="item">
									<div class="bible-verse-slide active text-center">
										<blockquote>
											<p>&ldquo;The LORD [is] my strength and my shield; my heart trusted in him, and I am helped: therefore my heart greatly rejoiceth; and with my song will I praise him.&rdquo;</p>
											<span>Psalms 28:7</span>
										</blockquote>
									</div>
								</div>
								<div class="item">
									<div class="bible-verse-slide active text-center">
										<blockquote>
											<p>&ldquo;And we have known and believed the love that God hath to us. God is love; and he that dwelleth in love dwelleth in God, and God in him.&rdquo;</p>
											<span>1 John 4:16</span>
										</blockquote>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection