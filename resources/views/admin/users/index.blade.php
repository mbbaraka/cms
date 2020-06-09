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
                        Users - list
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary float-right">Add
                            New</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Avator</th>
                                <th scope="col">Role</th>
                                <th scope="col" width="150">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="{{ $user->avator }}" class="img-thumbnail" style="width: 80px; height: 70px;">
                                    </td>
                                    <td>
                                        @if($user->role == 'admin')
                                            {{ 'Administrator'}}
                                        @elseif($user->role == 'editor')
                                            {{ 'Editor'}}
                                        @elseif($user->role == 'author')
                                            {{ 'Author'}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                           class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#delete{{$user->id}}"
                                           class="btn btn-sm btn-danger" data-toggle='modal'>Delete</a>
                                    </td>
                                </tr>
                                {{-- Modal for deleting  banner --}}
                                <div class="modal fade show" id="delete{{ $user->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Deleting : {{ $user->name }}</h3>
                                                <button class="close" type="button" data-dismiss='modal'>&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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
