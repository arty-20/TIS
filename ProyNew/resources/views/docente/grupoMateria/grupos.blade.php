@extends('layouts.docente')
@section('arbol')
  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder"></i>
      <span>{{ $materia->NOMBRE_MATERIA}}</span>
      <i class="fa fa-angle-left pull-righ"></i>
    </a>
     <ul class="treeview-menu">
       @foreach($grupos as $grupo)
       	@if($grupo->ESTADO_GC == 1)
        <li><a href="{{URL::action('docente\PracticaGrupoController@mostrarGrupo',$grupo->ID_GRUPOLAB)}}"><i class="fa fa-circle-o"></i>{{$grupo->NOMBRE_DIA}}  {{$grupo->HORA_INICIO}} - {{$grupo->HORA_FIN}}</a>
        </li>
        @endif
     @endforeach
    </ul>
  </li>
 
@endsection

@section('contenido')


<center><h3><b>{{ $materia->NOMBRE_MATERIA }}</b></h3></center>

 @foreach($grupos as $grupo)
  	@if($grupo->ESTADO_GC == 1)
		<div class="col-md-4 col-sm-8 col-xs-12">
			<a style="color: #000000;" href="{{URL::action('docente\PracticaGrupoController@mostrarGrupo',$grupo->ID_GRUPOLAB)}}">
			<div class="info-box" style="background-color:#ffbf80; ">
		        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
		        <div class="info-box-content">
		          <span class="info-box-number">{{$grupo->NOMBRE_DIA}}  {{$grupo->HORA_INICIO}} - {{$grupo->HORA_FIN}}</span>
		        </div>
		        <!-- /.info-box-content -->
		      </div>
		     </a>
		</div>

 	@endif
 @endforeach
<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	<a href="{{URL::action('docente\DocenteController@crearGrupo',$materia->ID_MATERIA)}}" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Añadir Grupo </a></button>
 	</div>
</div>
 @endsection
