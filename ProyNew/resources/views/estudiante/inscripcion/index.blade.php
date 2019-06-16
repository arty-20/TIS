@extends('layouts.estudiante')
@section('inscripcion-estudiante')
    <div>
        <div class ="pad">
            <center><h2>Materias en las que estas Inscrito</h2></center>            
            <div class="card-columns">
            <div class="card">
            <div class="card-body">
            <a href="{{asset('estudiante/inscripcion/listarMaterias')}}">
                <center>
                    <img  src="{{ asset('/img/mas.png') }}" alt="Más" width="150">
                </center>
            </a>
            </div>
        </div>
            @foreach ($gruposInscrito as $gi)
                @if($gi->ESTADO == 1)
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{$gi->NOMBRE_MATERIA}}</h5>
                            <p class="card-text">{{$gi->NOMBRE_DOCENTE}} <br>
                                {{$gi->HORA_INICIO}}<br>
                                {{$gi->NOMBRE_DIA}}
                            </p>
                            <a href="{{URL::action('estudiante\SesionMateriaController@listarSesiones',
                        array('idGrupo'=>$gi->ID_GRUPOLAB ,
                        'idEstudiante'=>$gi->ID_ESTUDIANTE))}}" class="btn btn-primary">Entrar al Curso</a>
                        <a href="{{URL::action('estudiante\SesionMateriaController@listarCalificaciones',
                                array('idGrupo'=>$gi->ID_GRUPOLAB ,
                                'idEstudiante'=>$gi->ID_ESTUDIANTE))}}" 
                                class="btn btn-primary jaja">
                                Calificaciones</a>
                        </div>
                    </div>
                @endif
            @endforeach    
            </div>
        
            
        </div>
    </div>   
           
    
@endsection

