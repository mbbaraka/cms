@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Gallery - create
                        <button class="btn btn-primary float-right" onclick="goBack()">Back</button>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'galleries.store', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">{!! $errors->first('name') !!}</span>@endif
                        </div>
                        <label for="basic-url">Select Image</label>
                            <div class="input-group mb-3 @if($errors->has('image_url')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('image_url', null, ['class' => 'form-control', 'placeholder' => 'Url', 'id'=>'thumbnail']) !!}
                            </div>
                              @if ($errors->has('image_url'))
                              <span
                                class="text-danger">{!! $errors->first('image_url') !!}</span>@endif<br>

                        {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
