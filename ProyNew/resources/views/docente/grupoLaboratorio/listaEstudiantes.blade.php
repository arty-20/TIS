@extends('layouts.docente')
@section('contenido')
<h2>Listado de Estudiantes</h2>

<div class="row">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
       <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead  style="background-color:#A9D0F5">
                <th>Codigo SIS</th>
				<th>Nombre Estudiante</th>
				<th>Grupo Laboratorio</th>
				<th>Opciones</th>
            </thead>
            @foreach ($estudiantes as $est)
            <tr>
                <td>{{ $est->CODIGO_SIS}}</td>
                <td>{{ $est->NOMBRE_ESTUDIANTE.' '.$est->APELLIDO_ESTUDIANTE}}</td>
                <td>{{ $est->ID_GRUPOLAB}}</td>
               	<td><a href="#"><button class="btn btn-info">Ver Portafolio</button></a></td>
            </tr>
            @endforeach
        </table>
    	</div>
 	</div>
</div>
 @endsection
