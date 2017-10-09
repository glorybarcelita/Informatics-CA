@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
        {{-- <div class="col"> --}}
            <div class="card p-4">
                <div class="card-body">
                    <h4 class="card-title">User Register</h4>
                    <form method="POST" action="{{ url('/user/store') }}">
                        {{ csrf_field() }}

                        @include('auth.userform')

                        <div class="form-group" align="center">                        
                            <button type="submit" class="btn btn-primary">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
