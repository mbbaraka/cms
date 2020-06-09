@extends('home.layouts.app')

@section('content')

		
	<section class="page-header">
		
		<div class="container">
			
			<h1>Churches</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="{{ config('app.url') }}">Home</a>
			<span>Churches</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - Portfolio Filter - - - - - - - - - - - -->	
			
		<ul id="portfolio-filter" class="portfolio-filter">

			<li><a data-categories="*">All</a></li>
			<li><a data-categories="Central">Central</a></li>
			<li><a data-categories="Western">Western</a></li>
			<li><a data-categories="Eastern">Eastern</a></li>
			<li><a data-categories="Northern">Northern</a></li>

		</ul><!--/ #portfolio-filter -->
		
		<!-- - - - - - - - end Portfolio Filter - - - - - - - - - - -->	
		
		<section id="portfolio-items" class="portfolio-items pl-col-3">

			@foreach($churches as $church)
			<article class="one-third column" data-categories="* {{ $church->region }}">
				
				<div class="project-thumb">
					
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image" href="{{ url('churches/'.$church->slug.'.html') }}">
								<img style="width: 248px; height: 224px" src="{{ $church->image_url }}" alt="{{ $church->name }}" />
							</a>
						</figure>
					</div><!--/ .bordered-->					
					
				</div>
				<div class="entry-title">

						<h4 class="title"><a href="{{ url('churches/'.$church->slug.'.html') }}" style="text-transform: capitalize;">{{ $church->name }} Church</a></h4>
						
						<span class="place" style="text-transform: capitalize;"><b>Subzone: </b>{{ $church->subzone}}</span>&nbsp;
						<span class="place" style="text-transform: capitalize;"><b>Zone: </b>{{ $church->zone}}</span><br>
						<span class="place"><b>Contact: </b>{{ $church->contact}}</span>
						
					</div><!--/ .entry-title-->								

			</article><!--/ .one-third-->
			@endforeach
		</section><!--/ #portfolio-items-->
			
			{{ $churches->links() }}
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->	
@endsection