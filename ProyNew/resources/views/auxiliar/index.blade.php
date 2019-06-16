@extends ('layouts.admin0')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		@if($grupoaux->isNotEmpty())
			<h3>Listado de Grupos de Auxiliar: {{ $grupoaux[0]->NOMBRE_AUXILIAR }}</h3>
		@else
			<h3>Auxiliar no Asignado</h3>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			@if($grupoaux->isNotEmpty())
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>N*</th>
					<th>NOMBRE_AUXILIAR</th>
					<th>NOMBRE_DOCENTE</th>
					<th>NOMBRE_MATERIA</th>
					<th>HORA_INICIO</th>
					<th>HORA_FIN</th>
					<th>DIA</th>
					<th>Ir...</th>
				</thead>
               @foreach ($grupoaux as $grux)
				<tr>
						<td>{{ $grux->ID_GRUPOLAB }}</td>
	          <td>{{ $grux->NOMBRE_AUXILIAR }}</td>
	          <td>{{ $grux->NOMBRE_DOCENTE }}</td>
	          <td>{{ $grux->NOMBRE_MATERIA }}</td>
						<td>{{ $grux->HORA_INICIO }}</td>
						<td>{{ $grux->HORA_FIN }}</td>
						<td>{{ $grux->NOMBRE_DIA }}</td>
						<td>
							<a href="{{URL::action('Auxiliar\AuxiliarController1@listarEstudiantes',
			                  array('idestud'=>$grux->ID_AUXILIAR,'idlabo'=>$grux->ID_GRUPOLAB))}}"
			                  class="list-group-item list-group-item-action">Ver</a>
						</td>
				</tr>

				@endforeach
			</table>
			@else
			<h3>---</h3>

			@endif
		</div>

	</div>
</div>

@endsection
