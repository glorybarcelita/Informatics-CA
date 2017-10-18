@extends('layouts.app')

@section('content')
  @foreach($curriculum as $curri)
    {{ $curri->field_name }}
  @endforeach
@endsection