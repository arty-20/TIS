@extends('layouts.docente')

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

 @endsection
