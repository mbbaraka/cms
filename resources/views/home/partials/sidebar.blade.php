		<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	
		@php 
			$post = App\Post::orderBy('id', 'ASC')->where('is_published', '1')->limit(5)->get();
       	 	$category = App\Category::orderBy('id', 'DESC')->where('is_published', '1')->get();
		@endphp
		<aside id="sidebar" class="one-third column">
			
			<div class="widget widget_search">
				
				<form action="/" method="post" id="searchform">
					
					<fieldset>
						
						<input type="text" class="form-control typeahead" />
					
						<button type="submit" title="Search">Search</button>	
					
					</fieldset>
					
				</form><!--/ #searchform-->
				
			</div><!--/ .widget-->
			
			<div class="widget widget_popular_posts">
				
				<h3 class="widget-title">Popular Posts</h3>
				
				<ul>
					@foreach($post as $posts)
						<li>
							<div class="bordered alignleft">
								<figure class="add-border">
									<a class="single-image" style="width: 35px; height: 35px" href="{{ url('news/' . $posts->slug).'.html' }}"><img src="{{ $posts->thumbnail }}" alt="" /></a>
								</figure>
							</div><!--/ .bordered-->						
							<h6><a href="{{ url('news/' . $posts->slug).'.html' }}">{{ $posts->title }}</a></h6>
							<div class="entry-meta">Posted on : {{ date('M d, Y', strtotime($posts->created_at)) }}<a href="#">&nbsp;</a></div>
						</li>
					@endforeach
				</ul>
				
			</div><!--/ .widget-->
			
			<div class="widget widget_categories">
				
				<h3 class="widget-title">Categories</h3>
				
				<ul>
					@foreach($category as $categories)
						<li><a href="{{ url('categories/' . $categories->slug).'.html' }}">{{ $categories->name }}</a></li>
					@endforeach
				</ul>
				
			</div><!--/ .widget-->
			
			<div class="widget widget_latest_tweets">

				<h3 class="widget-title">Latest Tweets</h3>

				<div id="tweet"></div>

			</div><!--/ .widget-->
			
			<div class="widget widget_flickr">
				
				<h3 class="widget-title">Flickr Feed</h3>

				<ul id="flickr-badge" class="flickr-badge clearfix"></ul>
				
			</div><!--/ .widget-->

			<div class="widget widget_video">

				<h3 class="widget-title">Video</h3>

				<video width="300" height="160" style="width: 100%; height: 100%;" id="player1" poster="media/echo-hereweare.jpg" controls="controls" preload="none">
					<!-- MP4 source must come first for iOS -->
					<source type="video/mp4" src="media/echo-hereweare.mp4" />
					<!-- WebM for Firefox 4 and Opera -->
					<source type="video/webm" src="media/echo-hereweare.webm" />
					<!-- OGG for Firefox 3 -->
					<source type="video/ogg" src="media/echo-hereweare.ogv" />
					<!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
					<object width="300" height="160" type="application/x-shockwave-flash" data="js/flashmediaelement.swf"> 		
						<param name="movie" value="js/flashmediaelement.swf" /> 
						<param name="flashvars" value="controls=true&poster=media/echo-hereweare.jpg&file=media/echo-hereweare.mp4" /> 		
						<!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
						<img src="media/echo-hereweare.jpg" width="300" height="160" alt="Here we are" 
							title="No video playback capabilities" />
					</object> 	
				</video>	

			</div><!--/ .widget-->

		</aside><!--/ #sidebar-->
		
		<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->		