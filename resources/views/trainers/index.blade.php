@extends('layouts.app')
@section('title','Trainers Index')

@section('content')

  <div class="row">
    @foreach ($trainers as $trainer)
      <div class="col-sm">
        <div class="card text-center" style="width: 18rem; margin-top:70px;">
          <img class="card-img-top rounded-circle mx-auto d-block;"
            style="heigth: 100px; width:100px; background-color:#EFEFEF; margin:20px;"
            src="images/{{$trainer->avatar}}" alt="">
          <div class="card-body">
            <h5 class="card-title"><p>{{$trainer->name}}</p></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver Mas</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
