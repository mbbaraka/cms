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
                        Sermons - list
                        <a href="{{ route('sermons.create') }}" class="btn btn-sm btn-primary float-right">Add
                            New</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="table">
                            <thead>
                            <tr>
                                <th scope="col" width="30">#</th>
                                <th scope="col" width="500">Title</th>
                                <th scope="col">Created By</th>
                                <th scope="col" width="150">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($sermons as $sermon)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $sermon->title }}</td>
                                    <td>{{ $sermon->user->name }}</td>
                                    <td>
                                        <a href="{{ route('sermons.edit', $sermon->id) }}"
                                           class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#view{{$sermon->id}}"
                                           class="btn btn-sm btn-secondary" data-toggle='modal'>View</a>
                                           <a href="#delete{{$sermon->id}}"
                                           class="btn btn-sm btn-danger" data-toggle='modal'>Delete</a>
                                    </td>
                                </tr>
                                {{-- Modal for Viewing  banner --}}
                                <div class="modal fade show" id="view{{ $sermon->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Viewing : {{ $sermon->name }}</h3>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $sermon->image_url }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for deleting  banner --}}
                                <div class="modal fade show" id="delete{{ $sermon->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Deleting : {{ $sermon->name }}</h3>
                                                <button class="close" type="button" data-dismiss='modal'>&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['sermons.destroy', $sermon->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                <div class="justify-content-between">
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                <button class="btn-sm btn-secondary float-right" data-dismiss='modal'>Cancel</button>                                 
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
