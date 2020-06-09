@extends('home.layouts.app')

@section('content')

	<section class="page-header">
		
		<div class="container">
			
			<h1>Contact</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="index.html">Home</a>
			<span>Contact</span>

		</div><!--/ .breadcrumbs-->	
		
		
		<div class="sixteen columns">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.581613871452!2d33.156443914093686!3d0.6241202636526585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177e83503a0fb6bf%3A0x823a1c5e76d7dd37!2sUAFCR%20Church!5e0!3m2!1sen!2sug!4v1591704058699!5m2!1sen!2sug" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>		
		</div>
		
		<div class="column-divider"></div>
		<div class="nine columns">
			
			<h3>Send an Email</h3>
			@if(Session::has('message'))
                <p class="success type-1">
                	{{ Session('message') }}
                </p>
           	@endif
			<section id="contact">

				{!! Form::open(['route' => 'contact.submit']) !!}

					<p class="input-block @if($errors->has('name')) has-error @endif">
						<label for="name">Name:</label>
						<input type="text" name="name" id="name" />
						@if ($errors->has('name'))
                         <span style="color: red;">{!! $errors->first('name') !!}</span>
                        @endif
					</p>

					<p class="input-block @if($errors->has('email')) has-error @endif"> 
						<label for="email">E-mail:</label>
						<input type="text" name="email" id="email" />
						@if ($errors->has('email'))
                         <span style="color: red;">{!! $errors->first('email') !!}</span>
                        @endif
					</p>

					<p class="input-block @if($errors->has('message')) has-error @endif">
						<label for="message">Message:</label>
						<textarea name="message" id="message" cols="30" rows="10"></textarea>
						@if ($errors->has('message'))
                         <span style="color: red;">{!! $errors->first('message') !!}</span>
                        @endif
					</p>

					<p class="input-block">
						<button class="button default" type="submit" id="submit">Submit</button>
					</p>

				{!! Form::close() !!}	

			</section><!--/ #contact-->				
			
		</div><!--/ .nine .columns-->
		
		<div class="widget widget_text">
				
			<h3 class="widget-title">Contact us for any iquiries</h3>
			
			<div class="textwidget">
				
				<p>
					 Lorem ipsum dolor sit amet, consectetur adipisc ing elit. Nulla iaculis aliquet augue,
					 eu varius purus sollicitudin eget. Donec tellus nunc, sollicitudin eu congue tempor,
					 dapibus et metus. Fusce ac ipsum at magna accumsan scelerisque sed non dolor. Mauris
					 consectetur laoreet feugiat. 
				</p>
				
			</div><!--/ .textwidget-->

		</div><!--/ .widget-->

		<div class="seven columns">
			
			<h3>Main Headquarters</h3>
			
			<span>
				Address:   &nbsp;&nbsp;&nbsp;&nbsp; {{ $settings->address }} <br />
				Phone:    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <a href="tel:">{{ $settings->contact }}</a> <br />
				Email:      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="mailto:">{{ $settings->email }} </a>
			</span>
			
		</div><!--/ .seven .columns-->

	
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->
@endsection