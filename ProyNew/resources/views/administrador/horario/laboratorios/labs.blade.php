@extends('layouts.admin')
@section('contenido')
<div class="row">
	{{$horario->render()}}
<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
			<th>Día</th>
			<th>Hora</th>
			<th>Acción</th>
		</thead>
		@foreach ($horario as $hor)
		<tr>
			<td>{{$hor->NOMBRE_DIA}}</td>
			<td>{{$hor->HORA_INICIO.'-'.$hor->HORA_FIN}}</td>
		<td><a href="{{URL::action('Administrador\HorarioController@ocupado',$hor->ID_HORA_DIA_LABORATORIO)}}"><button>
				@if(($hor->DISPONIBLE)==1)
                Ocupar
                @elseif(($hor->DISPONIBLE)==0)
                Desocupar
                @endif
			</button></a></td>
		</tr>
		@endforeach
	</table>
</div>
</div>
<div>
	<a href="/administrador/horario">Volver</a>
</div>
@endsection
