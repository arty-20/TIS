@extends ('layouts.administrador')
@section ('contenidoadmin')

<div>
	<h3>Grupos de Laboratorio</h3>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="table_responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>Grupo de laboratorio</th>
				<th>Materia</th>
				<th>Docente</th>
				<th>Auxiliar</th>
				<th>Horario</th>
			</thead>
			@foreach ($lista as $li)
			<tr>
				<td>{{$li->NOMBRE_MATERIA.'-'.$li->NOMBRE_DOCENTE}}</td>
				<td>{{$li->NOMBRE_MATERIA}}</td>
				<td>{{$li->NOMBRE_DOCENTE.' '.$li->APELLIDO_DOCENTE}}</td>
				<td>{{$li->NOMBRE_AUXILIAR.' '.$li->APELLIDO_AUXILIAR}}</td>
			<td>{{$li->NOMBRE_LABORATORIO.'->'.$li->NOMBRE_DIA.'->'.$li->HORA_INICIO.'-'.$li->HORA_FIN}}</td>
			</tr>
			@endforeach			
		</table>
	</div>
	{{$lista->links('administrador.pagination')}}
	</div>
</div>
<div>
<h4><a href="../../gestion">Volver</a></h4>
</div>
@endsection