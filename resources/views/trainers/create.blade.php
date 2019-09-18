@extends('layouts.app')
@section('title','Trainers Create')

@section('content')
  @include('common.errors')
  
  <form class="form-group" action="/trainers" method="post" enctype="multipart/form-data">
      @csrf
      @include('trainers.form')
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>

@endsection
