@extends('home.layouts.app')

@section('content')
	
	<section class="page-header">
		
		<div class="container">
			
			<h1>Gallery Mixed</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="index.html">Home</a>
			<span>Gallery Mixed</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - Portfolio Filter - - - - - - - - - - - -->	
			
		<ul id="portfolio-filter" class="portfolio-filter">

			<li><a data-categories="*">All</a></li>
			<li><a data-categories="sermons">Sermons</a></li>
			<li><a data-categories="people">People</a></li>
			<li><a data-categories="spiritual">Spiritual Art</a></li>
			<li><a data-categories="other">Other</a></li>

		</ul><!--/ #portfolio-filter -->
		
		<!-- - - - - - - - end Portfolio Filter - - - - - - - - - - -->	
		
		<section id="gallery" class="gallery">

			<article class="one-third column" data-categories="spiritual other">
				
				<div class="project-thumb">
					
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image video-icon" rel="gallery" href="http://www.youtube.com/v/72UPv2NaX3g?version=3&feature=player_detailpage"><img src="{{ config('app.url') }}/home/images/portfolio/thumbs/col3-2.jpg" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
				</div><!--/ .project-thumb-->

			</article><!--/ .one-third-->

			<article class="one-third column" data-categories="people other">
				
				<div class="project-thumb">
					
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image video-icon" rel="gallery" href="http://player.vimeo.com/video/7449107?byline=0&portrait=0"><img src="{{ config('app.url') }}/home/images/portfolio/thumbs/col3-4.jpg" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
				</div><!--/ .project-thumb-->

			</article><!--/ .one-third-->

			<article class="one-third column" data-categories="spiritual other">
				
				<div class="project-thumb">
					
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image video-icon" rel="gallery" href="http://www.youtube.com/v/72UPv2NaX3g?version=3&feature=player_detailpage"><img src="{{ config('app.url') }}/home/images/portfolio/thumbs/col3-6.jpg" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
				</div><!--/ .project-thumb-->

			</article><!--/ .one-third-->

			<article class="one-third column" data-categories="people other">
				
				<div class="project-thumb">
					
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image video-icon" rel="gallery" href="http://player.vimeo.com/video/7449107?byline=0&portrait=0"><img src="{{ config('app.url') }}/home/images/portfolio/thumbs/col3-8.jpg" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
				</div><!--/ .project-thumb-->

			</article><!--/ .one-third-->

		</section><!--/ #portfolio-items-->

	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			

@endsection