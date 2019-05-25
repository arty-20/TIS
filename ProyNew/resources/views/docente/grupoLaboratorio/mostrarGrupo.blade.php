@extends('layouts.docente')

@section('contenido')

<h2>{{$grupoLaboratorio->NOMBRE_MATERIA}}</h2>
<h3>{{$grupoLaboratorio->GRUPOLAB}}</h3>
<h4>{{'Auxiliar Designado: '.$grupoLaboratorio->NOMBRE_AUXILIAR.' '.$grupoLaboratorio->APELLIDO_AUXILIAR}}</h4>
<a href="{{URL::action('docente\DocenteController@listarEstudiantes',$grupoLaboratorio->ID_GRUPOLAB)}}"><h4>Lista de Estudiantes</h4></a>


<div class="rows">
  <div class="panel panel-primary">
      <div class="panel-body">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form">
          <div class="form-row align-items-center">
        {!!Form::open(array('url'=>'docente/grupoLaboratorio','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}

          <input type="hidden" name="ID_PRAC_GRUPO" value="{{ $idLab }}">
           <div class="col-auto">
            <div class="form-group mx-sm-3 mb-2">
                <h4 for="archivo"><b>SUBIR NUEVA PRACTICA: </b></h4>
                <input type="file" name="archivo" class="form-control-file">
            </div>
          </div>
          <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <button class="btn btn-primary mb-2 col-auto" type="submit">Enviar</button>
          </div>
          </div>
        </div>
        {!!Form::close()!!}
        </div>
        </div>
      </div>
    </div>

</div>

@endsection
