@extends('layouts.docente')
@section('Mensaje')
<div class="callout callout-info">
  <h4>Bienvenido</h4>
 		En esta seccion se muestra sus materias
</div>
@endsection
@section('contenido')
<h3><b> Seleccione una materia</b></h3>
<div class="row">
  <div class="col-md-4 col-sm-8 col-xs-12">
    @foreach($materias as $materia)
    <div class="info-box" style="border: 1px solid yellow;"><a style="color: #33313b;" href="{{URL::action('docente\DocenteController@listarGrupos',
      array('idMateria'=>$materia->ID_MATERIA, 'idDocente'=>$materia->ID_DOCENTE))}}">
      <span class="info-box-icon"><i class="fa fa-fw fa-users"></i></span>
      <div class="info-box-content">

        <span class="info-box-number">{{$materia->NOMBRE_MATERIA}}</span>
      </div>

    </div>
    </a>
     @endforeach
  </div>
</div>

<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	<a href="crearGrupo" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Añadir Grupo </a></button>
 	</div>
 	<!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	<a href="auxiliar/create"><button type="button" class="btn btn-primary">Registrar Auxiliar </a></button>
 	</div> -->
</div>

 @endsection
