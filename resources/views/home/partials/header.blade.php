	<header id="header">
		
		<div class="container">
			
			<!-- - - - - - - - - - - - Logo - - - - - - - - - - - - - -->	
			
			<a href="{{ config('app.url') }}" id="logo">
				<img src="{{ config('app.url') }}/home/images/logo.png">
			</a><!--/ #logo-->	
			
			<!-- - - - - - - - - - - end Logo - - - - - - - - - - - - -->
			
			<!-- - - - - - - - - - - - Event Holder - - - - - - - - - - - - - -->	
			
			<div class="event-holder clearfix">
				@php
					$event = App\Events::orderBy('start_date', 'ASC')->where('is_published', '1')->first();
				@endphp
				<b>next event:</b>
				<span class="event-text" style="text-transform: capitalize;"><a href="{{ url('events/'.$event->slug.'.html') }}">{{ $event->title }}</a></span>
			</div><!--/ .event-holder-->
			
			<!-- - - - - - - - - - - end Event Holder - - - - - - - - - - - - -->	
			
			<div class="clear"></div>
			
			<!-- - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - -->	

			<nav id="navigation" class="navigation clearfix">
				@php
					$root = App\Page::orderBy('title', 'ASC')->where('is_root', 1)->where('is_published', 1)->get();
				@endphp
				<ul class="clearfix">
					<li class="{{ Request::routeIs('index') ? 'current-menu-item' : '' }}"><a href="{{ config('app.url')}}">Home</a></li>
					@foreach($root as $roots)
					<li><a href="#">{{ $roots->title }}</a>
						<ul>
							@php
								$pages = App\Page::orderBy('title', 'ASC')->where('root', $roots->id)->where('is_published', 1)->get();
							@endphp
							@foreach($pages as $page)
								<li><a href="{{ url('pages/'.strtolower($roots->title).'/' . $page->slug).'.html' }}">{{$page->title}}</a></li>
							@endforeach
						</ul>
					</li>
					@endforeach
					<li><a href="#">Media</a>
						<ul>
							<li><a href="{{ route('news')}}">News</a></li>
							<li><a href="{{ route('sermons')}}">Sermons</a></li>
							<li><a href="{{ route('galleries')}}">Galleries</a></li>
							<li><a href="{{ route('events')}}">Events</a></li>
						</ul>
					</li>
					<li class="{{ Request::routeIs('church') ? 'current-menu-item' : '' }}"><a href="{{ route('church')}}">Churches</a></li>
					<li class="{{ Request::routeIs('contact.show') ? 'current-menu-item' : '' }}"><a href="{{ route('contact.show') }}">Contact</a></li>
				</ul>
				
			</nav><!--/ #navigation-->

			<!-- - - - - - - - - - - - end Navigation - - - - - - - - - - - - - -->	
			
		</div><!--/ .container-->
		
	</header><!--/ #header-->