			<section id="comments">
				
				@if(Session::has('message'))
                    <p class="success type-1">
                    	{{ Session('message') }}
                    </p>
                @endif

                @if(Session::has('delete-message'))
                    <p class="error type-1">
                    	{{ Session('delete-message') }}
                    </p>
                @endif
                
				
					
					@if($comment)
					<h4><?= count($comment);?> Comments for this article</h4>
					<ol class="comments-list">
						@foreach($comment as $comments)
						<li class="comment">

							<article>

								<div class="bordered alignleft">
									<figure class="add-border">
										<a class="single-image" href="#"><img src="{{ config('app.url') }}/home/images/gravatar.png" alt="" /></a>
									</figure>
								</div><!--/ .bordered-->		

								<div class="comment-body">

									<div class="comment-meta">
										
										<div class="author">{{ $comments->name}}</div>
										<div class="date">{{ date('M d, Y', strtotime($comments->created_at)) }} at {{ date('h:i:sa', strtotime($comments->created_at)) }}</div>
									</div><!--/ .comment-meta -->

									<p>
										{{ $comments->message}}
									</p>
									
								</div><!--/ .comment-body -->

							</article>

						</li>
						@endforeach

					</ol>
					@else


					@endif


			</section><!--/ #comments-->	

			<section id="respond">

				<h4>Leave a Reply</h4>

				{{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}

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
					<input type="hidden" name="post_id" value="{{$post->id}}">
					<input type="hidden" name="slug" value="{{$post->slug}}">
					<p class="input-block">
						<label for="message @if($errors->has('message')) has-error @endif">Message:</label>
						<textarea name="message" id="message" cols="30" rows="10"></textarea>
						@if ($errors->has('message'))
                         <span style="color: red;">{!! $errors->first('message') !!}</span>
                        @endif	
					</p>

					<p class="input-block">
						{{ Form::submit('Send', ['class'=>'button default']) }}
					</p>
				
                {!! Form::close() !!}

			</section><!--/ #respond-->	