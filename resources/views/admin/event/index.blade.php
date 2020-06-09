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
                        Events - list
                        <a href="{{ route('events.create') }}" class="btn btn-sm btn-primary float-right">Add New</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="table">
                            <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col">Title</th>
                                <th>Venue</th>
                                <th>Event Date and Time</th>
                                <th>Event Time and Time</th>
                                <th scope="col">Created By</th>
                                <th scope="col" width="129">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->venue }}</td>
                                    <td>{{ date('d/M/Y', strtotime($event->start_date)) }}
                                        at {{ date('h:i:sa', strtotime($event->start_date)) }}
                                    </td>
                                    <td>{{ date('d/M/Y', strtotime($event->end_date)) }}
                                        at {{ date('h:i:sa', strtotime($event->end_date)) }}
                                    </td>
                                    <td>{{ $event->user->name }}</td>
                                    <td>
                                        <a href="{{ route('events.edit', $event->id) }}"
                                           class="btn-sm btn-primary">Edit</a>
                                        <a href="#delete{{$event->id}}"
                                           class="btn-sm btn-danger" data-toggle='modal'>Delete</a>
                                    </td>
                                    <div class="modal fade show" id="delete{{$event->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Deleting Event
                                                    </h4>
                                                    <button class="close" data-dismiss='modal'>&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                    <div>
                                                        <button class="btn-sm btn-secondary float-right" data-dismiss='modal'>Cancel</button>
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
