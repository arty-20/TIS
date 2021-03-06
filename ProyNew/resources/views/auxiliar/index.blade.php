@extends ('layouts.admin0')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estudiante Grupo 1 - {{ $estudiantes[0]->NOMBRE_AUXILIAR }}</h3>
		@include('auxiliar.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>N*</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Documento</th>
					<th>URL</th>
					<th>Comentario</th>
					<th>Estado Entrega</th>
					<th>Otros</th>
				</thead>
               @foreach ($estudiantes as $est)
				<tr>
					<td>{{ $est->ID_PORTAFOLIO }}</td>
					<td>{{ $est->NOMBRE_ESTUDIANTE }}</td>
					<td>{{ $est->APELLIDO_ESTUDIANTE }}</td>
					<td>{{ $est->PRACTICA }}</td>
					<td><a href="{{URL::action('Auxiliar\AuxiliarController1@descargar',
	                  array('id'=>$est->ID_PORTAFOLIO,'archivo'=>$est->PRACTICA))}}"
	                  class="list-group-item list-group-item-action">{{$est->PRACTICA}}</a></td>
					<td>{{ $est->COMENTARIO_AUXILIAR }}</td>
					<td>
						@if ($est->PRACTICA !== '')
							Entregado
						@else
							No Entregado
						@endif
					</td>
					<td>
						<div class="row">
							@if ($est->COMENTARIO_AUXILIAR !== '')
							<div class="col-md-5">
								<a href="{{ route('auxiliar.edit',$est->ID_PRAC_GRUPO) }}" class="btn btn-primary material-icons"
									style="color: white" data-toggle="tooltip" data-placement="top" title="Editar">edit</a>
		            </a>
							</div>
							@else
							<div class="col-md-5">
								<a href="{{ route('auxiliar.edit',$est->ID_PRAC_GRUPO) }}" class="btn btn-warning material-icons" style="color: white"
                  data-toggle="tooltip" data-placement="top" title="Comentar">announcement</a>
		            </a>
							</div>
							@endif
						</div>
					</td>
				</tr>

				@endforeach
			</table>
		</div>

	</div>
</div>

@endsection
