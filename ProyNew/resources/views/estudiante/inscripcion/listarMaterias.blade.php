
@extends('layouts.estudiante')
@section('inscripcion-estudiante')
<div class="row">
        <div class ="pad">
            <center><h2>Inscribirse a una Materia</h2></center>
            
            @foreach ($materias as $m)
                @if($m->ESTADO == 1)
                    <div class="prueba" > 
                        <div class="card text-center">
                        <div class="card-body">
                            <br><br>
                            <h5 class="card-title">{{$m->NOMBRE_MATERIA}}</h5>
                           <a href="{{URL::action('estudiante\InscripcionController@listarDocentesDeLaMateria',$m->ID_MATERIA)}}" class="btn btn-primary">Inscribirse Grupo</a>
                        </div>
                        </div>        
                    </div>
                @endif
            @endforeach
            
  </div>
  </div>
@endsection

