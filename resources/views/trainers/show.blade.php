@extends('layouts.app')
@section('title','Trainer')
@section('content')
  @include('common.success')
  <img class="card-img-top rounded-circle mx-auto d-block text-center;"
      style="heigth: 100px; width:100px; background-color:#EFEFEF; margin:20px;"
       src="/images/{{$trainer->avatar}}" alt="">
      <div class="text-center">
        <h5 class="card-title"><p>{{$trainer->name}}</p></h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
        Some quick example text to build on the card title and make up the bulk of the card's content.
        Some quick example text to build on the card title and make up the bulk of the card's content.
        Some quick example text to build on the card title and make up the bulk of the card's content.
      </p>
      <a href="{{$trainer->slug}}/edit" class="btn btn-outline-warning">Editar</a>
      <form action="{{route('trainers.destroy', $trainer->slug)}}" method="POST">
                      @csrf
                      @method('DELETE')
           <button type="submit" class="btn btn-outline-danger" placeholder="Borrar"
            onclick="return confirm('Quiere borrar el registro?')" >Borrar</button>
    </form>
  </div>
<modal-button></modal-button>
<create-form-pokemon></create-form-pokemon>
<list-of-pokemons></list-of-pokemons>

@endsection
