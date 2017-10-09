@extends('layouts.app')

@section('content')
<div class="container col-md-8">
    <div class="card border-secondary mb-3">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            <div class="card-header">
                <legend>User Login</legend>
            </div>
            <div class="card-body text-secondary">  
                @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif

                {{ csrf_field() }}
                <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-sm-2 col-form-label">E-Mail</label>

                    <div class="col-sm-10">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>

                    <div class="col-sm-10">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>     
            </div>
            <div class="card-footer bg-transparent border-secondary">
                <div class="clearfix">
                    <div class="float-left">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div> 
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
