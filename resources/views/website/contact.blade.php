@extends('layouts.home')

@section('content')
	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 offset-md-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<h1>Contact Us</h1>
										<h2>At any time<!-- <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a> --></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="fh5co-contact">
			<div class="row animate-box">
				<div class="col-md-6 offset-md-3 text-center fh5co-heading">
					<h2>Contact us</h2>
					<p>We have churches in almost all the regions of the country. You can however, reach us through the contact form below.</p>
				</div>
				@if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session('message')}}
                    </div>
                @endif
			</div>
			<div class="row">
				<div class="col-md-3 animate-box">
					<h3>Our Address</h3>
					<ul class="contact-info">
						<li><i class="icon-location4"></i>{{ $settings->address }}</li>
						<li><i class="icon-phone3"></i>{{ $settings->contact }}</li>
						<li><i class="icon-location3"></i><a href="mailto:">{{ $settings->email }}</a></li>
						<li><i class="icon-globe2"></i><a href="{{ config('app.url') }}">{{ config('app.url') }}</a></li>
					</ul>
				</div>
				<div class="col-md-7 animate-box">
					{!! Form::open(['route' => 'contact.submit']) !!}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" required class="form-control" placeholder="Name" name="name" required
                               data-validation-required-message="Please enter your name.">
                               <p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required
			                               data-validation-required-message="Please enter your email address.">
			                        <p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="tel" name="tel" class="form-control" placeholder="Phone Number" id="phone" required
			                               data-validation-required-message="Please enter your phone number.">
			                        <p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required
			                                  data-validation-required-message="Please enter a message."></textarea>
			                        <p class="help-block text-danger"></p>
								</div>
							</div>
							<div id="success"></div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-group">
					                    <button type="submit" class="btn btn-primary btn-modify" id="sendMessageButton">Send</button>
					                </div>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div><!-- END container-wrap -->
	@endsection