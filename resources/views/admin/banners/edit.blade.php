@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Banner - create
                        <button onclick="goBack()" class="btn-sm btn-primary float-right">Back</button>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' =>  ['banners.update', $banners->id], 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', $banners->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">{!! $errors->first('name') !!}</span>@endif
                        </div>
                        <label for="basic-url">Image Url</label>
                            <div class="input-group mb-3 @if($errors->has('image_url')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('image_url', $banners->image_url, ['class' => 'form-control', 'placeholder' => 'Name', 'id'=>'thumbnail']) !!}
                              @if ($errors->has('image_url'))<span
                                class="text-danger">{!! $errors->first('image_url') !!}</span>@endif
                            </div>
                        <div class="form-group @if($errors->has('banner_desc')) has-error @endif">
                            {!! Form::label('Description') !!}
                            {!! Form::text('banner_desc', $banners->banner_desc, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                            @if ($errors->has('banner_desc'))
                                <span class="help-block">{!! $errors->first('banner_desc') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('url')) has-error @endif">
                            {!! Form::label('Target Url') !!}
                            {!! Form::text('url', $banners->url, ['class' => 'form-control', 'placeholder' => 'Its optional']) !!}
                            @if ($errors->has('url'))
                                <span class="help-block">{!! $errors->first('url') !!}</span>@endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('Publish') !!}
                            {!! Form::select('is_published', [1 => 'Published', 0 => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Update',['class' => 'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
