@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Page - edit
                        <button class="btn-sm btn-primary float-right" onclick="goBack()">Back</button>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' =>  ['pages.update', $page->id], 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}
                        <div class="box-body">
                            <label for="basic-url">Thumbnail</label>
                            <div class="input-group mb-3 @if($errors->has('thumbnail')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('thumbnail', $page->thumbnail, ['class' => 'form-control', 'placeholder' => 'Name', 'id'=>'thumbnail']) !!}
                              @if ($errors->has('thumbnail'))<span
                                class="text-danger">{!! $errors->first('thumbnail') !!}</span>@endif
                            </div>

                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                {!! Form::label('Title') !!}
                                {!! Form::text('title', $page->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                                @if ($errors->has('title'))
                                    <span class="text-danger">{!! $errors->first('title') !!}</span>@endif
                            </div>

                            <label for="basic-url">Images</label>
                            <div class="input-group mb-3 @if($errors->has('image_url')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text lfm" id="lfm" data-input="thumnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('image_url', $page->image_url, ['class' => 'form-control thumbnail', 'placeholder' => 'Image Url', 'id'=>'thumnail']) !!}
                              @if ($errors->has('image_url'))<span
                                class="text-danger">{!! $errors->first('image_url') !!}</span>@endif
                            </div>
                            <div class="form-group @if($errors->has('details')) has-error @endif">
                                {!! Form::label('Details') !!}
                                {!! Form::textarea('details', $page->details, ['class' => 'form-control textarea', 'placeholder' => 'Details']) !!}
                                @if ($errors->has('details'))
                                    <span class="text-danger">{!! $errors->first('details') !!}</span>@endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('Root') !!}
                                {!! Form::select('is_root', [1 => 'Root', 0 => 'Not Root'], isset($page->is_root) ? $page->is_root : null, ['class' => 'form-control']) !!}
                            </div>
                            <div>
                                {!! Form::label('Root Page') !!}
                                {!! Form::select('root', $root, null, ['class' => 'form-control', 'id' => 'root']) !!}
                                @if ($errors->has('root'))
                                    <span class="help-block">{!! $errors->first('root') !!}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('Publish') !!}
                                {!! Form::select('is_published', [1 => 'Publish', 0 => 'Draft'], isset($page->is_published) ? $page->is_published : null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="box-footer">
                            {!! Form::submit('Update',['class' => 'btn btn-sm btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.replace('details');
        });
    </script>
@endsection
