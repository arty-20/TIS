@extends('layouts.docente')
@section('arbol')
  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder"></i>
      <span>{{ $materia->NOMBRE_MATERIA}}</span>
      <i class="fa fa-angle-down pull-righ"></i>
    </a>
     <ul class="treeview-menu">
       @foreach($grupos as $grupo)
       	@if($grupo->ESTADO_GC == 1)
        <li><a href="{{URL::action('docente\PracticaGrupoController@mostrarGrupo',array('id'=>$grupo->ID_GRUPOLAB,'idM'=>$materia->ID_MATERIA))}}"><i class="fa fa-circle-o"></i>{{$grupo->NOMBRE_DIA}}  {{$grupo->HORA_INICIO}} - {{$grupo->HORA_FIN}}</a>
      </li>
        @endif
     @endforeach
    </ul>
  </li>
  <li class="treeview">
    <a href="{{URL::action('docente\PracticaGrupoController@reporte',$materia->ID_MATERIA)}}">
      <i class="fa fa-file-text-o"></i>
      <span>ver Reportes</span>
    </a>
  </li>
@endsection

@section('contenido')


<center><h3><b>{{ $materia->NOMBRE_MATERIA }}</b></h3></center>

 @foreach($grupos as $grupo)
  	@if($grupo->ESTADO_GC == 1)
		<div class="col-md-4 col-sm-8 col-xs-12">
			<a style="color: #000000;" href="{{URL::action('docente\PracticaGrupoController@mostrarGrupo', array('id'=>$grupo->ID_GRUPOLAB,'idM'=>$materia->ID_MATERIA))}}">
			<div class="info-box bg-gray-active">
            <span class="info-box-icon bg-navy"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
						<span class="info-box-number">{{$grupo->NOMBRE_DIA}}  {{$grupo->HORA_INICIO}} - {{$grupo->HORA_FIN}}</span>
            </div>
        </div>
			</a>
		</div>
		@endif
 @endforeach
<div class="row btn-a">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<a href="{{URL::action('docente\DocenteController@crearGrupo',$materia->ID_MATERIA)}}" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Añadir Grupo </a></button>
 
  	<a href="{{URL::action('docente\PracticaGrupoController@reporte',$materia->ID_MATERIA)}}" style="color: #FFFFFF;"><button type="button" class="btn bg-olive margin">Ver Reporte</a></button>
 	</div>
</div>
   
 @endsection