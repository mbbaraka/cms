@extends('home.layouts.app')

@section('content')


	<section class="page-header">
		
		<div class="container">
			
			<h1>Events</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs"> 

			<a title="Home" href="index.html">Home</a>
			<span>Events</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
		 
		<section id="content" class="ten columns">
			
			@foreach($events as $event)
				<article class="entry event">
				
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image" href="{{ url('events/' . $event->slug).'.html' }}"><img src="{{ $event->thumbnail }}" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
					<div class="entry-meta">
						
					<span class="date">{{ date('d', strtotime($event->start_date)) }}</span>
						<span class="month">{{ date('M',strtotime($event->start_date)) }}</span>

					</div><!--/ .entry-meta-->

					<div class="entry-body">
						
						<div class="entry-title">

							<h2 class="title"><a href="{{ url('events/' . $event->slug).'.html' }}">{{ $event->title }}</a></h2>
							
							<span class="e-date"><b>{{ date('M d, Y',strtotime($event->start_date)) }} – {{ date('M d, Y',strtotime($event->end_date)) }}</b>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
								<strong>{{ date('h:i:a',strtotime($event->start_date)) }} – {{ date('h:i:a',strtotime($event->end_date)) }} </strong>
							</span>
							<span class="place"><b>Place: </b>{{ $event->venue }}</span>
							
						</div><!--/ .entry-title-->					

						<p>
							 <?= str_limit(htmlspecialchars_decode($event->details), 300, '...'); ?>
						</p>
						<br>
						<a href="{{ url('events/' . $event->slug).'.html' }}" class="button default small">Event Details</a>

					</div><!--/ .entry-body -->

				</article><!--/ .entry-->
			@endforeach
		</section><!--/ #content-->
		
		<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
		
		<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	
		
		<aside id="sidebar" class="one-third column">
			
			<div class="widget widget_search">
				
				<form action="/" method="post" id="searchform">
					
					<fieldset>
						
						<input type="text" />
					
						<button type="submit" title="Search">Search</button>	
					
					</fieldset>
					
				</form><!--/ #searchform-->
				
			</div><!--/ .widget-->
			
			<div class="widget widget_popular_posts">
				
				<h3 class="widget-title">Popular Posts</h3>
				
				<ul>
					<li>
						<div class="bordered alignleft">
							<figure class="add-border">
								<a class="single-image" href="#"><img src="images/temp/recent-img-1.jpg" alt="" /></a>
							</figure>
						</div><!--/ .bordered-->						
						<h6><a href="#">Donec rutrum lobortis nulla</a></h6>
						<div class="entry-meta">Sep, 15, <a href="#">2 Comments</a></div>
					</li>
					<li>
						<div class="bordered alignleft">
							<figure class="add-border">
								<a class="single-image" href="#"><img src="images/temp/recent-img-2.jpg" alt="" /></a>
							</figure>
						</div><!--/ .bordered-->							
						<h6><a href="#">Consequuntur magni dolores eos qui ratione</a></h6>
						<div class="entry-meta">Sep, 15, <a href="#">2 Comments</a></div>
					</li>
					<li>
						<div class="bordered alignleft">
							<figure class="add-border">
								<a class="single-image" href="#"><img src="images/temp/recent-img-3.jpg" alt="" /></a>
							</figure>
						</div><!--/ .bordered-->	
						<h6><a href="#">Nulla vitae elit libero, a pharetra augue</a></h6>
						<div class="entry-meta">Sep, 15, <a href="#">2 Comments</a></div>
					</li>
				</ul>
				
			</div><!--/ .widget-->
			
			<div class="widget widget_categories">
				
				<h3 class="widget-title">Categories</h3>
				
				<ul>
					<li><a href="#">Announcements</a></li>
					<li><a href="#">Community</a></li>
					<li><a href="#">Ministries</a></li>
					<li><a href="#">Missions</a></li>
				</ul>
				
			</div><!--/ .widget-->
			
			<div class="widget widget_latest_tweets">

				<h3 class="widget-title">Latest Tweets</h3>

				<div id="tweet"></div>

			</div><!--/ .widget-->
			
		</aside><!--/ #sidebar-->
		
		<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->				
	
			
	</section><!--/ .main -->

@endsection

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			