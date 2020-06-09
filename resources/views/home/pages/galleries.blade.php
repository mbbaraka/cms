@extends('home.layouts.app')

@section('content')

	<section class="page-header">
		
		<div class="container">
			
			<h1>Gallery</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="index.html">Home</a>
			<span>Gallery</span>

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

			@foreach($galleries as $gallery)
				<article class="four columns" data-categories="sermons people">
				
					<div class="project-thumb">
						
						<div class="bordered">
							<figure class="add-border">
								<a class="single-image picture-icon" rel="gallery" href="{{ $gallery->image_url }}"><img src="{{ $gallery->image_url }}" alt="" style="min-height: 136px" /></a>
							</figure>
						</div><!--/ .bordered-->
						
					</div><!--/ .project-thumb-->

				</article><!--/ .four-->
			@endforeach

		</section><!--/ #portfolio-items-->
		{{ $galleries->links() }}
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->	

@endsection