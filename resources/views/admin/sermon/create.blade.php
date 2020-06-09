@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper p-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sermon - create
                        <button onclick="goBack()" class="btn btn-primary float-right">Back</button>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'sermons.store', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            {!! Form::label('Title') !!}&nbsp;&nbsp;@if ($errors->has('title'))
                                <small class="text-danger">{!! $errors->first('title') !!}</small>@endif
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            
                        </div>
                        <label for="basic-url">Thumbnail</label>&nbsp;&nbsp;@if ($errors->has('thumbnail'))<small
                                class="text-danger">{!! $errors->first('thumbnail') !!}</small>@endif
                            <div class="input-group mb-3 @if($errors->has('thumbnail')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('thumbnail', null, ['class' => 'form-control', 'placeholder' => 'Thumbnail', 'id'=>'thumbnail']) !!}
                            </div>
                              

                        <label for="basic-url">Video File</label>&nbsp;&nbsp;@if ($errors->has('video_url'))<small
                                class="text-danger">{!! $errors->first('video_url') !!}</small>@endif
                            <div class="input-group mb-3 @if($errors->has('video_url')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Add Video Url</span>
                              </div>
                              {!! Form::text('video_url', null, ['class' => 'form-control', 'placeholder' => 'Thumbnail']) !!}
                            </div>

                        <label for="basic-url">Audio File</label>&nbsp;&nbsp;@if ($errors->has('audio_url'))<small
                                class="text-danger">{!! $errors->first('audio_url') !!}</small>@endif
                            <div class="input-group mb-3 @if($errors->has('audio_url')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Add Audio Url</span>
                              </div>
                              {!! Form::text('audio_url', null, ['class' => 'form-control', 'placeholder' => 'Thumbnail']) !!}
                            </div>

                        <div class="form-group @if($errors->has('date_of_sermon')) has-error @endif">
                            {!! Form::label('Date of Sermon') !!}&nbsp;&nbsp;@if ($errors->has('date_of_sermon'))
                                <small class="text-danger">{!! $errors->first('date_of_sermon') !!}</small>
                            @endif
                            {!! Form::date('date_of_sermon', null, ['class' => 'form-control', 'placeholder' => 'Date of Sermon']) !!}
                            
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

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.replace('details');

            $('#category_id').select2({
                placeholder: "Select categories"
            });
        });
    </script>
@endsection
