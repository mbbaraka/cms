@extends('layouts.app')

@section('login-content')
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card mt-5 bg-transparent border-light">
            <div class="card-header">
                <h4 class="text-center">
                    Administrator Login Form
                </h4>
            </div>
            <div class="card-body">
                <div class="container">
                </div>
                <form class="container" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent text-light"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input id="email" type="email" class="bg-transparent form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent text-light"><i class="fa fa-key"></i></span>
                        </div>
                        <input id="password" type="password" required autocomplete="current-password" class="bg-transparent form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-primary container-fluid">
                    </div>
                    @if (Route::has('password.request'))
                    <p class="float-right"><span><a href="{{ route('password.request') }}">Forgot Password?</a></span></p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
