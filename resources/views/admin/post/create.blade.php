@extends('layouts.app')

@section('stylesheet')
    <link href="{{ asset('/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper p-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Post - create
                        <button class="btn btn-primary float-right" onclick="goBack()">Back</button>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'posts.store']) !!}
                        <label for="basic-url">Thumbnail</label>
                            <div class="input-group mb-3 @if($errors->has('thumbnail')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('thumbnail', null, ['class' => 'form-control', 'placeholder' => 'Name', 'id'=>'thumbnail']) !!}
                              @if ($errors->has('thumbnail'))<span
                                class="text-danger">{!! $errors->first('thumbnail') !!}</span>@endif
                            </div>

                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            {!! Form::label('Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            @if ($errors->has('title'))
                                <span class="text-danger">{!! $errors->first('title') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('short_desc')) has-error @endif">
                            {!! Form::label('Short Description') !!}
                            {!! Form::textarea('short_desc', null, ['class' => 'form-control', 'placeholder' => 'Short Description', 'rows'=>3]) !!}
                            @if ($errors->has('short_desc'))
                                <span class="text-danger">{!! $errors->first('short_desc') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('details')) has-error @endif">
                            {!! Form::label('Details') !!}
                            {!! Form::textarea('details', null, ['class' => 'textarea form-control', 'placeholder' => 'Details']) !!}
                            @if ($errors->has('details'))
                                <span class="text-danger">{!! $errors->first('details') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('category_id')) has-error @endif">
                            {!! Form::label('Category') !!}
                            {!! Form::select('category_id[]', $categories, null, ['class' => 'select2 form-control', 'id' => 'category_id', 'multiple' => 'multiple','data-placeholder'=>'Select Categories']) !!}
                            @if ($errors->has('category_id'))
                                <span class="text-danger">{!! $errors->first('category_id') !!}</span>
                            @endif
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
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.replace('details');

            $('#category_id').select2({
                placeholder: "Select categories"
            });
        });
    </script>
@endsection
