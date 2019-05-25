@extends('layouts.estudiante')
@section('inscripcion-estudiante')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Registro de nuevo Estudiante</h3>
            <a href="{{asset('estudiante/registro/create')}}" ><button class="btn btn-success">Crear</button></a>
            <!-- <a href="estudiante/inscribirseMateria" ><button class="btn btn-success">Inscribirse</button></a> -->
        </div>
    </div>
@endsection