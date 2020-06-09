@extends('home.layouts.app')

@section('content')
	<section class="page-header">
		
		<div class="container">
			
			<h1 style="text-transform: capitalize;">{{ $event->title }}</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="{{ config('ap.url') }}">Home</a>
			<a title="Events" href="route('events)">Events</a>
			<span style="text-transform: capitalize;">{{ $event->title }}</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
		 
		<section id="content" class="ten columns">
			
			<article class="entry event">
				
				<div class="bordered">
					<figure class="add-border">
						<img src="{{ $event->thumbnail }}" alt="{{ $event->title }}" />
					</figure>
				</div><!--/ .bordered-->
				
				<div class="entry-meta">
					
					<span class="date">{{ date('d', strtotime($event->start_date)) }}</span>
					<span class="month">{{ date('M', strtotime($event->start_date)) }}</span>

				</div><!--/ .entry-meta-->

				<div class="entry-body">
					
					<div class="entry-title">

						<h2 class="title" style="text-transform: capitalize;">{{ $event->title }}</h2>
						
						<span class="e-date"><b>{{ date('M d, Y', strtotime($event->start_date))}} – {{ date('M d, Y', strtotime($event->end_date))}}</b>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
							<strong>{{ date('h:i a', strtotime($event->start_date))}} – {{ date('h:i a', strtotime($event->end_date))}} </strong>
						</span> 
						<span class="place" style="text-transform: capitalize;"><b>Place: </b>{{ $event->venue }}</span>
						
					</div><!--/ .entry-title-->		
					
				</div><!--/ .entry-body -->

				<div class="nine columns offset-by-one alpha omega">

					<p>
						<?= htmlspecialchars_decode($event->details); ?>
					</p>					

				</div><!--/ .nine-columns-->

			</article><!--/ .entry-->
			
			<div class="border-divider"></div>
			
				<section id="content" class="ten columns">		
					<a href="#" class="button default small">Attend</a>
				</section>
				
			</section><!--/ #content-->
			
			<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
			
			<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	
			
			@include('home.partials.sidebar')
			
			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->				
		
				
		</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->
@endsection