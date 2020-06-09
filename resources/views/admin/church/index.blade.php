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
                        Churches - List
                        <a href="{{ route('churches.create') }}" class="btn btn-sm btn-primary float-right">Add
                            New</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-responsive table-responsive-sm mb-0" id="table">
                            <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" width="250">Preview</th>
                                <th scope="col" width="200">Created By</th>
                                <th scope="col" width="200">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($churches as $church)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $church->name }}</td>
                                    <td><a href="{{ $church->image_url }}" target="_blank">
                                        <img src="{{ $church->image_url }}" class="img-fluid" style="width: 120px; height: 80px;">
                                    </a> </td>
                                    <td>{{ $church->user->name }}</td>
                                    <td>
                                        <a href="{{ route('churches.edit', $church->id) }}"
                                           class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#view{{ $church->id }}" data-toggle="modal" class="btn btn-sm btn-secondary">View</a>
                                        <a href="#delete{{ $church->id }}" data-toggle="modal" class="btn btn-sm btn-danger">Delete</a>
                                        
                                    </td>
                                </tr>
                                {{-- Modal for Viewing  church --}}
                                <div class="modal fade show" id="view{{ $church->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Viewing {{ $church->name }}</h3>
                                                <button class="close" data-dismiss="modal">&times</button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $church->image_url }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for deleting  church --}}
                                <div class="modal fade show" id="delete{{ $church->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Delete {{ $church->name }}</h3>
                                                <button class="close" data-dismiss="modal">&times</button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['churches.destroy', $church->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                <div class="justify-content-between">
                                                  <button class="btn-sm btn-secondary float-right" data-dismiss='modal'>Cancel</button> 
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
