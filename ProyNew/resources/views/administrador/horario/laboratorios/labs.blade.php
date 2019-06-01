
@extends('administrador.horario.index')
@section('labos')

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
		<td><a href="{{URL::action('Administrador\HorarioController@ocupado',$hor->ID_HORA_DIA_LABORATORIO)}}">
				@if(($hor->DISPONIBLE)==1)
                <button class="btn btn-primary">Ocupar</button>
                @elseif(($hor->DISPONIBLE)==0)
                <button class="btn btn-success">Desocupar</button>
                @endif
			</a></td>
		</tr>
		@endforeach
	</table>
</div>
</div>
@endsection
