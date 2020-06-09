@extends('home.layouts.app')

@section('content')

	<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		
	
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

			<a title="Home" href="{{ route('index')}}">Home</a>
			<a title="News" href="{{ route('news')}}">News</a>
			<span>{{ $post->title }}</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		@php
			$comment = App\Comments::orderBy('id', 'DESC')->where('post_id', $post->id)->where('is_published', '1')->get();
		@endphp
		<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
		 
		<section id="content" class="ten columns">
			
			<article class="entry">
				
				<div class="bordered">
					<figure class="add-border">
						<img src="{{ $post->thumbnail }}" alt="" />
					</figure>
				</div><!--/ .bordered-->
				
				<div class="entry-meta">
					
					<span class="date">{{ date('d', strtotime($post->created_at)) }}</span>
					<span class="month">{{ date('M', strtotime($post->created_at)) }}</span>

				</div><!--/ .entry-meta-->

				<div class="entry-body">
					
					<div class="entry-title">

						<h2 class="title">{{ $post->title }}</h2>
						
						<span class="author">Posted by <a href="#">{{ $post->user->name }}</a></span>,
						<span class="comments">With <a href="#"><?= count($comment);?></a> Comments</span>
						
					</div><!--/ .entry-title-->					

					<p>
						<?= htmlspecialchars_decode($post->details) ; ?>
					</p>
					
				</div><!--/ .entry-body -->

			</article><!--/ .entry-->
			
			@include('home.partials.comment')
			
		</section><!--/ #content-->
		
		<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
		
		@include('home.partials.sidebar')		
	
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			
	

@endsection

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			