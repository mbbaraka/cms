@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-2">
        <div class="row">
            <div class="col">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif

                @if(Session::has('delete-message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('delete-message') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Gallery - list
                        <a href="{{ route('galleries.create') }}" class="btn btn-sm btn-primary float-right">Add
                            New</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-responsive-sm mb-0" id="example1">
                            <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Preview</th>
                                <th scope="col" width="200">Created By</th>
                                <th scope="col" width="200">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $gallery->name }}</td>
                                    <td><a href="{{ $gallery->image_url }}" target="_blank">
                                        <img src="{{ $gallery->image_url }}" style="width: 120px; height: 80px;">
                                    </a>
                                    </td>
                                    <td>{{ $gallery->user->name }}</td>
                                    <td>
                                        <a href="{{ route('galleries.edit', $gallery->id) }}"
                                           class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#view{{ $gallery->id }}" data-toggle="modal" class="btn btn-sm btn-secondary">View</a>
                                        <a href="#delete{{ $gallery->id }}" data-toggle="modal" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                {{-- Modal for Viewing  gallery --}}
                                <div class="modal fade show" id="view{{ $gallery->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Viewing : {{ $gallery->name }}</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $gallery->image_url }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for deleting  gallery --}}
                                <div class="modal fade show" id="delete{{ $gallery->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Deleting : {{ $gallery->name }}</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['galleries.destroy', $gallery->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                <p>Are you sure you want to delete this image from galleries?</p>
                                                <div class="justify-content-between">
                                                    <button class="btn btn-sm btn-secondary float-right" data-dismiss = 'modal'>Cancel</button>
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                </div>                                                
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
