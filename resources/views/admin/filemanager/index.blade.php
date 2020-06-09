@extends('layouts.app')

@section('content')
   <div class="content-wrapper">
       <div class="container-fluid m-2">
           <div class="row">
               <iframe src="{{ config('app.url') }}/admin/files" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
           </div>
       </div>
   </div>
@endsection
