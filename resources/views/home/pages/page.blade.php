@extends('home.layouts.app')
@section('content')
	<section class="page-header">
		
		<div class="container">
			
			<h1>{{ $page->title }}</h1>
			
		</div><!--/ .container--> 
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="{{ config('app.url') }}">Home</a>
			<span>{{ $page->title }}</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
			
		<div class="bordered">
			
			<figure class="add-border">
				<img src="images/temp/full-width.jpg" alt="" />
			</figure>
			
		</div><!--/ .bordered-->
		
		<div class="sixteen columns">
			
			<p>
				<?=htmlspecialchars_decode($page->details);?>
			</p>
			
		</div><!--/ .eight .columns-->
		
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			
@endsection