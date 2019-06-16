@extends ('layouts.admin0')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		@include('auxiliar.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			@if($practicag->isNotEmpty())
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>N*</th>
					<th>Nombre Session</th>
					<th>Fecha</th>
					<th>Practica</th>
					<th>Nombre Docente</th>
				</thead>
               @foreach ($practicag as $pracg)
				<tr>
					<td>{{ $pracg->ID_PRAC_GRUPO }}</td>
					<td>{{ $pracg->NOMBRE_SESION }}</td>
					<td>{{ $pracg->FECHA }}</td>

					<td><a href="{{URL::action('Auxiliar\AuxiliarController1@descargar',
	                  array('id'=>$portafolio[0]->ID_PORTAFOLIO,'archivo'=>$portafolio[0]->RUTA_ARCHIVO))}}"
	                  class="list-group-item list-group-item-action">{{$portafolio[0]->RUTA_ARCHIVO}}</a></td>
					<td>{{ $pracg->NOMBRE_DOCENTE }}</td>
				</tr>

				@endforeach
			</table>
			@else
			<h3>No exsiste Practica</h3>
			@endif
		</div>

	</div>
</div>

@endsection
