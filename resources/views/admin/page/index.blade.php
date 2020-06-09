@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-2">
        <div class="row">
            <div class="col">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session('message')}}
                    </div>
                @endif

                @if(Session::has('delete-message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session('delete-message')}}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Page - list
                        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-primary float-right">Add
                            New</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="table">
                            <thead>
                            <tr>
                                <th scope="col" width="20">#</th>
                                <th scope="col">Title</th>
                                <th>Root Page</th>
                                <th>Status</th>
                                <th scope="col" width="200">Created By</th>
                                <th scope="col" width="129">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <th scope="row">{{ $sn++ }}</th>
                                    <td>{{ $page->title }}</td>
                                    <td>
                                        <?php $root = App\Page::where('id', $page->root)->first();
                                        echo $root->title;
                                        ?>
                                    </td>
                                    <td>
                                        @if($page->is_published ==  1)
                                        {{ 'Active'}}
                                        @else
                                        {{ 'Not Active'}}
                                        @endif
                                    </td>
                                    <td>{{ $page->user->name }}</td>
                                    <td>
                                        <a href="{{ route('pages.edit', $page->id) }}"
                                           class="btn-sm btn-primary">Edit</a>
                                        <a href="#delete{{ $page->id }}" data-toggle='modal'
                                           class="btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                {{-- delete modal--}}
                                <div class="modal fade show" id="delete{{$page->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Deleting {{$page->title }}</h3>
                                                <button class="close" data-dismiss='modal'>&times;</button>
                                            </div>
                                            <div>
                                                <p>Are you sure you want to delete this page?</p>
                                                {!! Form::open(['route' => ['pages.destroy', $page->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                <div class="justify-content-between">
                                                    <button class="btn-sm btn-secondary float-right" data-dismiss='modal'>Cancel</button>
                                                    {!! Form::submit('Delete',['class' => 'btn btn-sm btn-danger']) !!}
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
