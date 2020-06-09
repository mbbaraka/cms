@php
	$settings = App\Setting::orderBy('id', 'ASC')->first();
@endphp
	<footer id="footer">
		
		<div class="container clearfix">
			
			<div class="four columns">
				
				<div class="widget widget_text">

					<h3 class="widget-title">About Our Church</h3>

					<div class="textwidget">

						<p>
							Mollis malesuada primis in faucibus luctus ultrces posuere cubilia nis velit porttitor euismod 
							pharetra interetiam laoreet gitis placerat magna sit amet massa posuere pretium. 
						</p>
						
					</div><!--/ .textwidget-->

				</div><!--/ .widget-->
				
				<div class="widget widget_contacts">
					
					<div class="vcard">
						<span class="contact street-address">Address: {{ $settings->address }}</span>
						<span class="contact tel">Phone:  <a href="tel:">{{ $settings->contact }}</a></span>
						<span class="contact email">E-mail: <a href="mailto:">{{ $settings->email }}</a></span>						
					</div><!--/ .vcard-->
					
				</div><!--/ .widget-->
				
			   <div class="widget widget_social">
				   
					<ul class="social-icons clearfix">
						<li class="twitter"><a href="{{ $settings->twitter_url }}">Twitter<span></span></a></li>
						<li class="facebook"><a href="{{ $settings->facebook_url }}">Facebook<span></span></a></li><!-- 
						<li class="dribble"><a href="#">Dribble<span></span></a></li>
						<li class="vimeo"><a href="#">Vimeo<span></span></a></li>
						<li class="rss"><a href="#">Rss<span></span></a></li> -->
					</ul><!--/ .social-icons-->				   
				   
			   </div><!--/ .widget-->
			
			</div><!--/ .four-->
			
			<div class="four columns">
				
				<div class="widget widget_nav_menu">

					<h3 class="widget-title">Recent Posts</h3>

					<ul>
						<li><a href="{{route('sermons')}}">Recent Sermons</a></li>
						<li><a href="{{route('church')}}">Nearby Churches</a></li>
						<li><a href="{{route('events')}}">Upcoming Events</a></li>
						<li><a href="{{route('galleries')}}">Church Gallery</a></li>
						<li><a href="{{route('news')}}">Recent News</a></li>
						<li><a href="{{route('contact.show')}}">Contact Us</a></li>
					</ul>

				</div><!--/ .widget-->				
				
			</div><!--/ .four-->
			
			<div class="four columns">
				
				<div class="widget widget_nav_menu">

					<h3 class="widget-title">Quick Links</h3>

					<ul>
						<li><a href="{{route('sermons')}}">Recent Sermons</a></li>
						<li><a href="{{route('church')}}">Nearby Churches</a></li>
						<li><a href="{{route('events')}}">Upcoming Events</a></li>
						<li><a href="{{route('galleries')}}">Church Gallery</a></li>
						<li><a href="{{route('news')}}">Recent News</a></li>
						<li><a href="{{route('contact.show')}}">Contact Us</a></li>
					</ul>

				</div><!--/ .widget-->				
				
			</div><!--/ .four-->
			
			<div class="four columns">
				
				<div class="widget widget_contact_form">

					<h3 class="widget-title">Subscribe to our Newsletter</h3>

					{!! Form::open(['route' => 'subscribe.submit']) !!}

					<p class="input-block @if($errors->has('email')) has-error @endif"> 
						<input type="email" required name="email" id="email" placeholder="Email Address" />
						@if ($errors->has('name'))
                         <span style="color: red;">{!! $errors->first('email') !!}</span>
                        @endif
					</p>
					<p class="input-block">
						<button class="button default" type="submit" id="submit">Submit</button>
					</p>

				{!! Form::close() !!}

				</div><!--/ .widget-->				
				
			</div><!--/ .four-->
			
		</div><!--/ .container-->
		
	</footer><!--/ #footer-->
	
	<!-- - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - -->	
	
	<!-- - - - - - - - - - - - - Bottom Footer - - - - - - - - - - - - - - -->	
	
	<footer id="bottom-footer" class="clearfix">
		
		<div class="container">
			
			<div class="copyright">Copyright © {{ date('Y')}}  ·  {{ $settings->copyright_text }}  &nbsp; &nbsp;|&nbsp; &nbsp;  {{ $settings->footer_text }}</div>
			
		</div><!--/ .container-->
		
	</footer><!--/ #bottom-footer-->