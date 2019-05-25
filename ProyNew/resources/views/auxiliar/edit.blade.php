@extends ('layouts.admin0')
@section ('contenido')
<div class="row">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		<h3>Comentario de Auxiliar en Portafolio de Session de
			{{ $estudiante[0]->NOMBRE_ESTUDIANTE }} {{ $estudiante[0]->APELLIDO_ESTUDIANTE }}</h3>
	</div>
</div>

{!!Form::model($estudiante,['method'=>'PATCH','route'=>['auxiliar.update',$estudiante[0]->ID_ESTUDIANTE]])!!}
<div class="form-group">
  <textarea class="form-control" id="comentario" rows="5"></textarea>
  <br>
  <div class="form-group row">
    <div class="col-md-2">
      <button type="submit" class="btn btn-success btn-block">Guardar</button>
    </div>
    <div class="col-md-2">
      <a href="{{route('auxiliar.index')}}" class="btn btn-danger btn-block">Cancelar</a>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection
