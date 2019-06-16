@extends ('layouts.admin0')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		@if($estudiantes->isNotEmpty())
			<h3>Listado de Estudiante Grupo {{ $estudiantes[0]->ID_GRUPOLAB }} -
			{{ $estudiantes[0]->NOMBRE_AUXILIAR }}</h3>
		@else
			<h3>No se encuentra Auxiliar en Materia</h3>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			@if($estudiantes->isNotEmpty())
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>N*</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Documento</th>
					<th>Comentario</th>
					<!-- <th>Estado Entrega</th> -->
					<th>Asistencia</th>
					<th>Otros</th>
				</thead>
               @foreach ($estudiantes as $est)
				<tr>
					<td>{{ $est->ID_PORTAFOLIO }}</td>
					<td>{{ $est->NOMBRE_ESTUDIANTE }}</td>
					<td>{{ $est->APELLIDO_ESTUDIANTE }}</td>
					<td><a href="{{URL::action('Auxiliar\AuxiliarController1@descargar',
	                  array('id'=>$est->ID_PORTAFOLIO,'archivo'=>$est->RUTA_ARCHIVO))}}"
	                  class="list-group-item list-group-item-action">{{$est->RUTA_ARCHIVO}}</a></td>
					<td>{{ $est->COMENTARIO_AUXILIAR }}</td>

					<td>{{ $est->CANTIDAD }}</td>
					<!-- <td>
						@if ($est->NOTA_DOCENTE === 0)
							No Asignado
						@else
							@if ($est->NOTA_DOCENTE <= 50)
								<span class="badge bg-red">{{$est->NOTA_DOCENTE}}</span>
							@else
								<span class="badge bg-green">{{$est->NOTA_DOCENTE}}</span>
							@endif
						@endif
					</td> -->

					<td>
						<div class="row">
							@if ($est->COMENTARIO_AUXILIAR !== '')

							@else
							<div class="col-md-5">
								<a href="{{ route('grupos.edit',$est->ID_PORTAFOLIO) }}" class="btn btn-warning material-icons" style="color: white"
                  data-toggle="tooltip" data-placement="top" title="Comentar">announcement</a>
		            </a>
							</div>
							@endif
						</div>
					</td>
				</tr>
				@endforeach
			</table>

			@else
			<h3>No existen Estudiantes en Materia</h3>

			@endif
		</div>
	</div>
</div>
@endsection
