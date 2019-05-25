@extends('layouts.estudiante')
@section('inscripcion-estudiante')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center><h2>Inscribirse con un docente</h2></center>
            <h5>Seleccione su docente: </h5>
            
            @foreach ($docentes as $d)
                @if($d->ESTADO == 1) 
                        <div class="prueba" >   
                        <center>
                        <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('/img/persona.png') }}" alt="imagen" width="100px">
                            <h5 class="card-title">{{$d->NOMBRE_DOCENTE}}</h5>
                           <a href="{{URL::action('estudiante\InscripcionController@buscarGrupos',array('idMateria'=>$id , 'idDocente'=>$d->ID_DOCENTE))}}" class="btn btn-primary">Inscribirse Grupo</a>
                        </div>
                        </div>
                        </center>          
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection