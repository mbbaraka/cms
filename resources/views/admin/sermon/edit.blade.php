@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper p-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sermon - Edit
                        <button onclick="goBack()" class="btn btn-primary float-right">Back</button>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' =>  ['sermons.update', $sermons->id], 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}
                        <label for="basic-url">Thumbnail</label>
                            <div class="input-group mb-3 @if($errors->has('thumbnail')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('thumbnail', $sermons->thumbnail, ['class' => 'form-control', 'placeholder' => 'Thumbnail', 'id'=>'thumbnail']) !!}
                              @if ($errors->has('thumbnail'))<span
                                class="text-danger">{!! $errors->first('thumbnail') !!}</span>@endif
                            </div>

                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            {!! Form::label('Title') !!}
                            {!! Form::text('title', $sermons->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            @if ($errors->has('title'))
                                <span class="text-danger">{!! $errors->first('title') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('video_url')) has-error @endif">
                            {!! Form::label('Video Url', null, ['style' => 'display: block;']) !!}
                            {!! Form::file('video_url') !!}
                            @if ($errors->has('video_url'))<span
                                class="text-danger">{!! $errors->first('video_url') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('audio_url')) has-error @endif">
                            {!! Form::label('Audio Url', null, ['style' => 'display: block;']) !!}
                            {!! Form::file('audio_url') !!}
                            @if ($errors->has('audio_url'))<span
                                class="text-danger">{!! $errors->first('audio_url') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('date_of_sermon')) has-error @endif">
                            {!! Form::label('Date of Sermon') !!}
                            {!! Form::date('date_of_sermon', $sermons->date_of_sermon, ['class' => 'form-control', 'placeholder' => 'Date of Sermon']) !!}
                            @if ($errors->has('date_of_sermon'))
                                <span class="text-danger">{!! $errors->first('date_of_sermon') !!}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Publish') !!}
                            {!! Form::select('is_published', [1 => 'Publish', 0 => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Update',['class' => 'btn btn-sm btn-primary']) !!}
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
