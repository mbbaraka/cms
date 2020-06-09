@extends('layouts.home')

@section('content')
	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ $page->thumbnail }});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 offset-md-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<h1>{{ $page->title }}</h1>
										<h2>At any time<!-- <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a> --></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="fh5co-about">
					<div class="row justify-content-center">
						<div class="col-md-10">
							<h3>{!! $page->title !!}</h3>
							<div class="row">
				                <div class="col-lg-10 col-md-10 mx-auto">
				                    {!! $page->details !!}
				                </div>
				            </div>
						</div>
					</div>
				</div>
	</div><!-- END container-wrap -->
	@endsection