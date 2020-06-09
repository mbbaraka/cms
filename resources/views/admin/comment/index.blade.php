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
                        Comments - list
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col" width="120">Author</th>
                                <th scope="col" width="200">Post</th>
                                <th>Message</th>
                                <th scope="col" width="30">Status</th>
                                <th scope="col" width="70">Created At</th>
                                <th scope="col" width="110">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->post->title }}</td>
                                    <td>{{ $comment->message }}</td>
                                    <td>
                                    	@if($comment->is_published == 1)
                                    	<span class="badge badge-primary">{{'Active'}}</span>
                                    	@else
                                    	<span class="badge badge-warning">{{'Inactive'}}</span>
                                    	@endif
                                    </td>
                                    <td>{{ date('d,M,Y', strtotime($comment->created_at)) }}</td>
                                    <td>
                                    	@if($comment->is_published == 1)
                                    		<a href="#disable{{$comment->id}}" class="btn-sm btn-secondary" data-toggle='modal'>Disable</a>
                                    	@else
                                    		<a href="#activate{{$comment->id}}" class="btn-sm btn-success" data-toggle='modal'>Activate</a>
                                    	@endif
                                           	<a href="#delete{{$comment->id}}"
                                           class="btn-sm btn-danger" data-toggle='modal'>Delete</a>
                                    </td>
                                </tr>
                                {{-- Modal for disable  comment --}}
                                <div class="modal fade show" id="disable{{ $comment->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Disabling : {{ $comment->name }}'s comment</h5>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['comments.update', $comment->is_published], 'method' => 'put', 'style' => 'display:inline']) !!}
                                                <div class="justify-content-between">
                                                {!! Form::submit('Disable', ['class' => 'btn btn-sm btn-primary']) !!}
                                                <input type="hidden" name="id" value="{{$comment->id}}">
                                                <button class="btn-sm btn-secondary float-right" data-dismiss='modal'>Cancel</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 {{-- Modal for activate  comment --}}
                                <div class="modal fade show" id="activate{{ $comment->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Activating : {{ $comment->name }}'s comment</h5>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['comments.update', $comment->is_published], 'method' => 'put', 'style' => 'display:inline']) !!}
                                                <input type="hidden" name="id" value="{{$comment->id}}">
                                                <div class="justify-content-between">
                                                {!! Form::submit('Activate', ['class' => 'btn btn-sm btn-success']) !!}
                                                <button class="btn-sm btn-secondary float-right" data-dismiss='modal'>Cancel</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal for deleting  comment --}}
                                <div class="modal fade show" id="delete{{ $comment->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Deleting : {{ $comment->name }}'s comment</h3>
                                                <button class="close" type="button" data-dismiss='modal'>&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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
