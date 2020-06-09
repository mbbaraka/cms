		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
					@foreach($banners as $banner)
					<li style="background-image: url('{{ $banner->image_url }}');">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 offset-md-3 text-center">
					   				<div class="slider-text">
						   				<div class="slider-text-inner">
						   					<h1>{{ $banner->name }}</h1>
												<p><a class="btn btn-primary btn-learn" href="#">Click to follow <i class="icon-arrow-right3"></i></a></p>
						   				</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	@endforeach
				</ul>
		  	</div>
		</aside>