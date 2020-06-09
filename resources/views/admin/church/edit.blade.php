@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Churches - Create
                        <button onclick="goBack()" class="btn btn-sm btn-primary float-right">Back</button>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' =>  ['churches.update', $churches->id], 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', $churches->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">{!! $errors->first('name') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('subzone')) has-error @endif">
                            {!! Form::label('Subzone') !!}
                            {!! Form::text('subzone', $churches->subzone, ['class' => 'form-control', 'placeholder' => 'Subzone']) !!}
                            @if ($errors->has('subzone'))
                                <span class="text-danger">{!! $errors->first('subzone') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('zone')) has-error @endif">
                            {!! Form::label('Zone') !!}
                            {!! Form::text('zone', $churches->zone, ['class' => 'form-control', 'placeholder' => 'Zone']) !!}
                            @if ($errors->has('zone'))
                                <span class="text-danger">{!! $errors->first('zone') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('overseer')) has-error @endif">
                            {!! Form::label('Overseer') !!}
                            {!! Form::text('overseer', $churches->overseer, ['class' => 'form-control', 'placeholder' => 'Overseer']) !!}
                            @if ($errors->has('overseer'))
                                <span class="text-danger">{!! $errors->first('overseer') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('region')) has-error @endif">
                            {!! Form::label('Region') !!}
                            {!! Form::select('region', ['Central' => 'Central','Eastern' => 'Eastern','Northern' => 'Northern','Western' => 'Western','Others' => 'Others'], $churches->region, ['class' => 'form-control']) !!}
                            @if ($errors->has('region'))
                                <span class="text-danger">{!! $errors->first('region') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('contact')) has-error @endif">
                            {!! Form::label('Contact') !!}
                            {!! Form::text('contact', $churches->contact, ['class' => 'form-control', 'placeholder' => 'Contact']) !!}
                            @if ($errors->has('contact'))
                                <span class="text-danger">{!! $errors->first('contact') !!}</span>@endif
                        </div>
                        <label for="basic-url">Church Image</label>
                            <div class="input-group mb-3 @if($errors->has('image_url')) has-error @endif">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="lfm" data-input="thumbnail" data-preview="holder">Upload</span>
                              </div>
                              {!! Form::text('image_url', $churches->image_url, ['class' => 'form-control', 'placeholder' => 'Name', 'id'=>'thumbnail']) !!}
                              @if ($errors->has('image_url'))<span
                                class="text-danger">{!! $errors->first('image_url') !!}</span>@endif
                            </div>

                        {!! Form::submit('Update',['class' => 'float-right btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
