@extends('estudiante.inscripcion.sesionMateria.principal')
@section('sesionMateria')
    <div class="row">

      <!-- @if($portafolio1)
        @foreach($portafolio1 as $p)
        <p>{{$p->ID_PORTAFOLIO}}</p>
      @endforeach
      @endif -->
      <!-- <p>{{Request::path()}}</p>
      <p>{{public_path()}}</p> -->
    </div>
    <div class="container">

    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action">{{$practica}}</a>
    </div>

@endsection