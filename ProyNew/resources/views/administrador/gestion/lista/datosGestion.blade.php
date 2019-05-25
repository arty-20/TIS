@extends ('layouts.admin')
@section ('contenido')

<div>
	<h3>Grupos de Laboratorio</h3>
</div>
<div class="row">
	<div class="table_responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>Id de grupo de laboratorio</th>
				<th>Docente</th>
				<th>Auxiliar</th>
				<th>Horario</th>
			</thead>
			@foreach ($lista as $li)
			<tr>
				<td>{{$li->ID_GRUPOLAB}}</td>
				<td>{{$li->NOMBRE_DOCENTE.' '.$li->APELLIDO_DOCENTE}}</td>
				<td>{{$li->NOMBRE_AUXILIAR.' '.$li->APELLIDO_AUXILIAR}}</td>
			<td>{{$li->NOMBRE_LABORATORIO.'->'.$li->NOMBRE_DIA.'->'.$li->HORA_INICIO.'-'.$li->HORA_FIN}}</td>
			</tr>
			@endforeach			
		</table>
	</div>
</div>
<a href="../">Volver</a>

@endsection