@extends('estudiante.inscripcion.sesionMateria.principal')
@section('sesionMateria')
    <div class="row">
      <!-- <p>{{Request::path()}}</p>
      <p>{{public_path()}}</p> -->
      <!-- <p>{{public_path()}} <br> </p>
      <p>{{storage_path('app/public')}}</p> -->
    </div>
    <div class="container">

    <div class="list-group">
      @foreach($paquete as $p )
        <a href="{{URL::action('estudiante\SesionMateriaController@descargar',array('id'=>$p->ID_PORTAFOLIO,'ruta'=>$p->RUTA_ARCHIVO))}}" class="list-group-item list-group-item-action">{{$p->RUTA_ARCHIVO}}</a>
      @endforeach
      <div class="list-group-item list-group-item-action">
        @include('estudiante.inscripcion.sesionMateria.prueba')
      </div>

      

@endsection
 
 