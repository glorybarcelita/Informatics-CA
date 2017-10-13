@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
  <div class="card p-4 col-sm-8">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Well done!</h4>
          <p>{{ session('message') }}</p>
        </div>
    @endif
    <div class="card-body">
      <h4 class="card-title">Change Password</h4>
      <form method="POST" action="{{ url('/user/change-password') }}">
        {{ csrf_field() }}
        <div class="form-group row">
          <label for="curr-pass" class="col-sm-2 col-form-label">Current Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="curr-pass" name="curr_password" placeholder="Password">
            @if ($errors->has('curr_password'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('curr_password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <hr>
        <div class="form-group row">
          <label for="new-pass" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="new-pass" name="password" placeholder="New Password">
            @if ($errors->has('password'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="confirm-pass" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="confirm-pass" name="password_confirmation" placeholder="Re-type Password">
            @if ($errors->has('password_confirmation'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection