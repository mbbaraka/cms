@extends('home.layouts.app')

@section('content')
	<section class="page-header">
		
		<div class="container">
			
			<h1 style="text-transform: capitalize;">{{ $church->title }}</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="{{ config('ap.url') }}">Home</a>
			<a title="Churches" href="route('church)">Churches</a>
			<span style="text-transform: capitalize;">{{ $church->name }}</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
		 
		<section id="content" class="ten columns">
			
			<article class="entry event">
				
				<div class="bordered">
					<figure class="add-border">
						<img src="{{ $church->image_url }}" alt="{{ $church->name }}" />
					</figure>
				</div><!--/ .bordered-->

				<div class="entry-body">
					
					<div class="entry-title">

						<h2 class="title" style="text-transform: capitalize; font-size: 14px">Church: {{ $church->name }}</h2>
						
						<span class="place" style="text-transform: capitalize; font-size: 14px"><b>Subzone: </b>{{ $church->subzone}}</span><br>
						<span class="place" style="text-transform: capitalize; font-size: 14px"><b>Zone: </b>{{ $church->zone}}</span><br>
						<span class="place" style="text-transform: capitalize; font-size: 14px"><b>Region: </b>{{ $church->region}}</span><br>
						<span class="place" style="text-transform: capitalize; font-size: 14px"><b>Overseer: </b>{{ $church->overseer}}</span><br>
						<span class="place" style="font-size: 14px"><b>Contact: </b>{{ $church->contact}}</span>
						
					</div><!--/ .entry-title-->		
					
				</div><!--/ .entry-body -->

				<div class="nine columns alpha omega">
					<h4>More Information</h4>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>					

				</div><!--/ .nine-columns-->

			</article><!--/ .entry-->
			
			<div class="border-divider"></div>
				
			</section><!--/ #content-->
			
			<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
			
			<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	
			
			@include('home.partials.sidebar')
			
			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->				
		
				
		</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->
@endsection