		<div class="fullwidthbanner">
			
			<ul>	
				@php
					$banners = App\Banner::orderBy('created_at', 'ASC')->where('is_published', 1)->limit(4)->get();
				@endphp
				<!-- FADE -->
				@foreach($banners as $banner)
				<li data-transition="fade" data-slotamount="10"> 	
					<img src="{{ $banner->image_url }}" alt="{{ $banner->name }}">
					<div class="caption sft big_black"  data-x="20" data-y="100" data-speed="900" data-start="1300" data-easing="easeOutBack">{{ $banner->name }}</div>
					<div class="caption sft medium_black"  data-x="20" data-y="145" data-speed="900" data-start="1300" data-easing="easeOutBack">{{ $banner->banner_desc }}</div>
					<div class="caption sfb" data-x="20" data-y="320" data-speed="750" data-start="1900" data-easing="easeOutExpo"><a class="button dark small" href="{{ $banner->url }}">Learn More</a></div>
				</li>
				@endforeach			
			</ul>
			
		</div><!--/ .fullwidthbanner-->	
		