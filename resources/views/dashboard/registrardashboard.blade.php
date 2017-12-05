@extends('layouts.app')

@section('content')

<div class="card border-info mb-3" style="max-width: auto;">
  <div class="card-header"><strong>DASHBOARD</strong></div>
  <div class="card-body text-info">
    <div class="row">
       <div class="col-md-4">
          <center>
            <a href="{{ url('subject/list') }}"><span class="sr-only">(current)</span><i class="fa fa-users fa-fontsize" aria-hidden="true"></i></a>
            
            <h6>Users</h6>  
            <h1>000</h1>
          </center>
        </div>

        <div class="col-md-4">
          <center>
             <a href="{{ url('subject/list') }}"><span class="sr-only">(current)</span><i class="fa fa-star-o fa-fontsize" aria-hidden="true"></i></a>
            
            <h6>Achievers</h6>
            <h1>000</h1>
          </center>
        </div>

        <div class="col-md-4">
          <center>
            <i class="fa fa-users" aria-hidden="true"></i>
            <h4>Users</h4>
            <h1>000</h1>
          </center>
        </div>
    
    </div>
  </div>
</div>




@endsection