@extends('home.layouts.app')

@section('content')

	<section class="page-header">
		
		<div class="container">
			
			<h1>Email Subscriptions</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="{{ config('app.url') }}">Home</a>
			<span>Subscribed</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<div class="sixteen columns">
			
			<h3>Email Subscriptions</h3>
				@if(Session::has('message'))
                    <p class="success type-1">
                    	{{ Session('message') }}
                    </p>
                    <p>
                    	Hello, You've successfully subscribed to our Newsletter. A confirmation message has been sent to you. You'll receive Newsletter once you confirm the email address
                    </p>
                @endif

                @if(Session::has('delete-message'))
                    <p class="error type-1">
                    	{{ Session('delete-message') }}
                    </p>
                    <p>
                    	Ooops!! This is embarassing. An error occured. Email was not successfully subscribed to our Newsletter. Please try again later.
                    </p>
                @endif
                @if(Session::has('exist-message'))
                    <p class="notice type-2">
                    	{{ Session('exist-message') }}
                    </p>
                    <p>
                    	Hello, the email address provided  is already subscribed to our Newsletter.
                    </p>
                @endif

		</div>
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->		

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->	

@endsection