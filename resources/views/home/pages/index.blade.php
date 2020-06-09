@extends('home.layouts.app')

@section('content')
			<!-- - - - - - - - - - - - - Slider - - - - - - - - - - - - - - - -->	
	
	<div class="fullwidthbanner-container">	
		@include('home.partials.banners')		
	</div><!--/ .fullwidthbanner-container-->

	<!-- - - - - - - - - - - - - end Slider - - - - - - - - - - - - - - -->
	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="container">	
		
		<!-- - - - - - - - - - - - - Holder - - - - - - - - - - - - - - -->
		
		<section class="holder clearfix">
			<!-- <h2 style="text-align: center; font-family: libre">Welcome to Universal Apostles' Fellowship Church of Righteousness</h2>
			<div class="column-divider"></div> -->
			<h2 align="center">Core Values</h2>
			<div class="four columns">
				
				<div class="detailimg">
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image" href="#"><img src="{{ config('app.url') }}/home/images/temp/temp-img-1.jpg" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
					<h5>Righteousness</h5>
					
					<p>
						This card contains righteousness as a core value in the church
					</p>
					
					<a href="#" class="button default">Learn More</a>
					
				</div><!--/ .detailimg-->
			</div>
			<div class="four columns">
				
				<div class="detailimg">
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image" href="#"><img src="{{ config('app.url') }}/home/images/temp/temp-img-1.jpg" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
					<h5>Marriage</h5>
					
					<p>
						This card contains Marriage as a core value in the church
					</p>
					
					<a href="#" class="button default">Learn More</a>
					
				</div><!--/ .detailimg-->
			</div>
			<div class="four columns">
				
				<div class="detailimg">
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image" href="#"><img src="{{ config('app.url') }}/home/images/temp/temp-img-1.jpg" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
					<h5>Court</h5>
					
					<p>
						This card contains Court as a core value in the church
					</p>
					
					<a href="#" class="button default">Learn More</a>
					
				</div><!--/ .detailimg-->
			</div>
			<div class="four columns">
				
				<div class="detailimg">
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image" href="#"><img src="{{ config('app.url') }}/home/images/temp/temp-img-1.jpg" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
					<h5>Service to Jesus</h5>
					
					<p>
						This card contains Service to Jesus as a core value in the church
					</p>
					
					<a href="#" class="button default">Learn More</a>
					
				</div><!--/ .detailimg-->
			</div>
			<div class="clear"></div>

		</section><!--/ .holder-->
		
		<!-- - - - - - - - - - - - end Holder - - - - - - - - - - - - - -->

		<!-- - - - - - - - - - - - - - - Bottom Sidebar - - - - - - - - - - - - - - - - -->	

		<aside id="bottom-sidebar" class="clearfix">

			<div class="one-third column">
				
				<div class="widget widget_recent_entries">

					<h3 class="widget-title">Latest News</h3>
					
					<ul>
						@foreach($posts as $post)
						<li>
							<h6><a href="{{ url('news/' . $post->slug).'.html' }}">{{ $post->title }}</a></h6>
							
							<div class="bordered alignleft">

								<figure class="add-border">
									<a class="single-image" style="width: 74px; height: 64px;" href="{{ url('news/' . $post->slug).'.html' }}"><img src="{{ $post->thumbnail }}" alt="" /></a>
								</figure>

							</div><!--/ .bordered-->
							
							<p>
								<!-- {{ str_limit((htmlspecialchars_decode($post->short_desc)), 30, '...')
								 }} -->
								 <?= str_limit(htmlspecialchars_decode($post->short_desc), 120, '...'); ?>

							</p>
						</li>
						@endforeach
					</ul>

				</div><!--/ .widget-->				
				
			</div><!--/ .one-third-->
			
			<div class="one-third column">
				
				<div class="widget widget_upcoming_events">
					
					<h3 class="widget-title">Upcoming Events</h3>
					<ul>
						@foreach($events as $event)
						<li>
							<div class="entry-meta">
								<span class="date">{{ date('d', strtotime($event->start_date))}}</span>
								<span class="month">{{ date('M', strtotime($event->start_date))}}</span>
							</div><!--/ .entry-meta-->
							
							<h6><a href="#">{{ $event->title }}</a></h6>
							<span class="place">{{ $event->venue }}</span>
							<span class="time">{{ date('h:i:a', strtotime($event->start_date))}} - {{ date('d/M h:i:a', strtotime($event->end_date)) }}</span>
							<span></span>
						</li>
						@endforeach
					</ul>
					
				</div><!--/ .widget-->
				
			</div><!--/ .one-third-->
			
			<div class="one-third column">
				
				<div class="widget widget_audio">
					
					<h3 class="widget-title">Listen to Podcasts</h3>
					
					<audio controls="control" src="{{ config('app.url') }}/home/media/AirReview-Landmarks-02-ChasingCorporate.mp3" type="audio/mp3"></audio>	
					
					<span class="question">How to Open Your Soul to Jesus?</span>
				
				</div><!--/ .widget-->
				
				<div class="widget-divider"></div>
				
				<div class="widget widget_video">
					
					<h3 class="widget-title">Featured Video</h3>
					
					<video width="300" height="160" style="width: 100%; height: 100%;" id="player1" poster="{{ config('app.url') }}/home/media/echo-hereweare.jpg" controls="controls" preload="none">
						<!-- MP4 source must come first for iOS -->
						<source type="video/mp4" src="{{ config('app.url') }}/home/media/echo-hereweare.mp4" />
						<!-- WebM for Firefox 4 and Opera -->
						<source type="video/webm" src="{{ config('app.url') }}/home/media/echo-hereweare.webm" />
						<!-- OGG for Firefox 3 -->
						<source type="video/ogg" src="{{ config('app.url') }}/home/media/echo-hereweare.ogv" />
						<!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
						<object width="300" height="160" type="application/x-shockwave-flash" data="{{ config('app.url') }}/home/js/flashmediaelement.swf"> 		
							<param name="movie" value="{{ config('app.url') }}/home/js/flashmediaelement.swf" /> 
							<param name="flashvars" value="controls=true&poster=media/echo-hereweare.jpg&file=media/echo-hereweare.mp4" /> 		
							<!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
							<img src="{{ config('app.url') }}/home/media/echo-hereweare.jpg" width="300" height="160" alt="Here we are" 
								title="No video playback capabilities" />
						</object> 	
					</video>	
					
				</div><!--/ .widget-->
				
			</div><!--/ .one-third-->

		</aside><!--/ #bottom-sidebar-->

		<!-- - - - - - - - - - - - - end Bottom Sidebar - - - - - - - - - - - - - - - -->	

	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->
@endsection