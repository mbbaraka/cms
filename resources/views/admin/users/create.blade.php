@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper p-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users - create
                        <button onclick="goBack()" class="btn btn-primary float-right">Back</button>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'users.store', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">{!! $errors->first('name') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            {!! Form::label('Email') !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            @if ($errors->has('email'))
                                <span class="text-danger">{!! $errors->first('email') !!}</span>@endif
                        </div>

                        <label for="basic-url">Avator</label>
                            <div class="input-group mb-3 @if($errors->has('avator')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text lfm" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('avator', null, ['class' => 'form-control', 'placeholder' => 'Avator', 'id'=>'thumbnail']) !!}
                              @if ($errors->has('avator'))<span
                                class="text-danger">{!! $errors->first('avator') !!}</span>@endif
                            </div>
                        <div class="form-group">
                            {!! Form::label('User Role') !!}
                            {!! Form::select('role', ['admin' => 'Administrator', 'author' => 'Author', 'editor' => 'Editor'], null, ['class' => 'form-control']) !!}
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
