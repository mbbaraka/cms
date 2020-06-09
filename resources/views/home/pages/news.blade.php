@extends('home.layouts.app')

@section('content')

	<section class="page-header">
		
		<div class="container">
			
			<h1>News</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="index.html">Home</a>
			<span>News</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
		 
		<section id="content" class="ten columns">
			
			@foreach($posts as $post)
				<article class="entry">
					
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image" href="{{ url('news/' . $post->slug).'.html' }}"><img src="{{ $post->thumbnail}}" alt="" /></a>
						</figure>
					</div><!--/ .bordered-->
					
					<div class="entry-meta">
						
					<span class="date">{{ date('d', strtotime($post->created_at)) }}</span>
					<span class="month">{{ date('M', strtotime($post->created_at)) }}</span>

					</div><!--/ .entry-meta-->

					<div class="entry-body">
						
						<div class="entry-title">
							@php
								$comment = App\Comments::orderBy('id', 'DESC')->where('post_id', $post->id)->where('is_published', '1')->get();
							@endphp
							<h2 class="title"><a href="{{ url('news/' . $post->slug).'.html' }}">{{ $post->title }}</a></h2>
							
							<span class="author">Posted by <a href="#">{{ $post->user->name }}</a></span>,
							<span class="comments">With <a href="#"><?=count($comment);?></a> Comments</span>
							
						</div><!--/ .entry-title-->					

						<p>
							<?= htmlspecialchars_decode($post->short_desc); ?>
						</p>
						
						<a href="{{ url('news/' . $post->slug).'.html' }}" class="button default small">Learn More</a>

					</div><!--/ .entry-body -->

				</article><!--/ .entry-->
			@endforeach

			
			{{ $posts->links() }}
			
		</section><!--/ #content-->
		
		<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
		
		@include('home.partials.sidebar')			
	
			
	</section><!--/ .main -->

@endsection

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			