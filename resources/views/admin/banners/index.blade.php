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
                        Banner - list
                        <a href="{{ route('banners.create') }}" class="btn btn-sm btn-primary float-right">Add
                            New</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-responsive-sm mb-0" id="table">
                            <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Preview</th>
                                <th>Status</th>
                                <th scope="col" width="200">Created By</th>
                                <th scope="col" width="200">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $banner->name }}</td>
                                    <td>
                                        <a href="{{ $banner->image_url }}" target="_blank">
                                        <img src="{{ $banner->image_url }}" style="width: 120px; height: 80px;">
                                    </a>
                                    </td>
                                    <td>
                                        @if($banner->is_published == 1)
                                            {{ 'Active'}}
                                        @else
                                            {{ 'Inactive'}}
                                        @endif
                                    </td>
                                    <td>{{ $banner->user->name }}</td>
                                    <td>
                                        <a href="{{ route('banners.edit', $banner->id) }}"
                                           class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#view{{ $banner->id }}" data-toggle="modal" class="btn btn-sm btn-secondary">View</a>
                                        <a href="#delete{{ $banner->id }}" data-toggle="modal" class="btn btn-sm btn-danger">Delete</a>
                                        
                                    </td>
                                </tr>
                                {{-- Modal for Viewing  banner --}}
                                <div class="modal fade show" id="view{{ $banner->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Viewing : {{ $banner->name }}</h3>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $banner->image_url }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for deleting  banner --}}
                                <div class="modal fade show" id="delete{{ $banner->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Deleting : {{ $banner->name }}</h3>
                                                <button class="close" type="button" data-dismiss='modal'>&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['banners.destroy', $banner->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                <div class="justify-content-between">
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                <button class="btn btn-secondary float-right" data-dismiss='modal'>Cancel</button>                                 
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
