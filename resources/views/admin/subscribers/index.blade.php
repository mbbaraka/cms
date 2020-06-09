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
                        Subscribers - list
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="table">
                            <thead>
                            <tr>
                                <th scope="col" width="30">#</th>
                                <th scope="col" width="500">Email</th>
                                <th scope="col">Date Subsccribed</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ date('d M, Y', strtotime($subscriber->created_at)) }}</td>
                                    <td>
                                           <a href="#delete{{$subscriber->id}}"
                                           class="btn btn-sm btn-danger" data-toggle='modal'>Delete</a>
                                    </td>
                                </tr>
                                {{-- Modal for deleting  subscriber --}}
                                <div class="modal fade show" id="delete{{ $subscriber->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Deleting : {{ $subscriber->email }}</h3>
                                                <button class="close" type="button" data-dismiss='modal'>&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => ['subscribers.destroy', $subscriber->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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
