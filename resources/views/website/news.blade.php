@extends('layouts.home')

@section('content')
	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 offset-md-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<h1>News</h1>
										<h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="fh5co-news">
			<div class="row animate-box">
				<div class="col-md-6 offset-md-3 text-center fh5co-heading">
					<h2>Our News</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row" id="myList">
					<div class="col-md-4 animate-box">
						<div class="news">
							<a href="news-details.php?id=2&article=ulrlr" class="img-holder"><img class="img-responsive" src="server/gallery/gallery_2.png" alt="Free HTML5 Website Template by freehtml5.co"></a>
							<div class="desc">
								<h3><a href="news-details.php?id=2&article=ulrlr">news article one</a></h3>
								<span class="date">10/04/2020</span>
								<p>may be by following functions will be easier to extract the needed sub parts from a string:</p>
								<a href="news-details.php?id=2&article=ulrlr">Read More <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
			</div>
			<div class="row justify-content-between">
				<button id="showLess" class="btn btn-outline-secondary">Show Less</button>
				<button id="loadMore" class="btn btn-outline-primary">Load More</button>
			</div>
		</div>
	</div><!-- END container-wrap -->
	@endsection