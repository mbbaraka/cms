@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper p-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Event - create
                        <button class="btn btn-sm btn-primary float-right" onclick="goBack()">Back to List</button>
                    </div>

                    <div class="card-body">
                        
                    <form method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            {!! Form::label('Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            @if ($errors->has('title'))
                                <span class="text-danger">{!! $errors->first('title') !!}</span>@endif
                        </div>

                        <label for="basic-url">Thumbnail</label>
                            <div class="input-group mb-3 @if($errors->has('thumbnail')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('thumbnail', null, ['class' => 'form-control', 'placeholder' => 'Url', 'id'=>'thumbnail']) !!}
                            </div>
                              @if ($errors->has('thumbnail'))
                              <span
                                class="text-danger">{!! $errors->first('thumbnail') !!}</span>
                              @endif<br>

                        <div class="form-group @if($errors->has('details')) has-error @endif">
                            {!! Form::label('Details') !!}
                            {!! Form::textarea('details', null, ['class' => 'textarea form-control', 'placeholder' => 'Details']) !!}
                            @if ($errors->has('details'))
                                <span class="text-danger">{!! $errors->first('details') !!}</span>@endif
                        </div>
                        <!-- Date and time range -->
                        <div class="row">
                            <div class='col-md-5'>
                                <div class="form-group @if($errors->has('start_date')) has-error @endif">
                                    <label>Start Date and Time</label>
                                   <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7" name="start_date"/>
                                        @if ($errors->has('start_date'))
                                        <span class="text-danger">{!! $errors->first('start_date') !!}</span>@endif
                                        <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-5'>
                                <div class="form-group @if($errors->has('end_date')) has-error @endif">
                                    <label>Start Date and Time</label>
                                   <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8" name="end_date" />
                                        @if ($errors->has('end_date'))
                                        <span class="text-danger">{!! $errors->first('end_date') !!}</span>@endif
                                        <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <div class="form-group @if($errors->has('venue')) has-error @endif">
                            {!! Form::label('Venue') !!}
                            {!! Form::text('venue', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            @if ($errors->has('venue'))
                                <span class="text-danger">{!! $errors->first('venue') !!}</span>@endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('Publish') !!}
                            {!! Form::select('is_published', [1 => 'Publish', 0 => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection