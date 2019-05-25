@extends('layouts.docente')

@section('contenido')

@if(count($errors)>0)
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif
{!!Form::open(array('url'=>'docente/index','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<h2>Nuevo Grupo</h2>
	<div class="rows">
     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="form-group">
              <label for="nombreMateria">Nombre de la Materia</label>

			<select  name="ID_DOC_MAT" id="ID_DOC_MAT"  class="form-control">
            	@foreach($materias as $materia)
                    <option value="{{$materia->ID_DOCENTE_MATERIA}}">{{ $materia->NOMBRE_MATERIA }}</option>
            	@endforeach
            </select>

        </div>
      </div>
    </div>
	 <div class="rows">
	 	<form class="form-inline">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="form-group">
						<label>Asignar Auxiliar: </label>
						<select name="ID_AUX" id="ID_AUX" class="form-control" >
							@foreach($auxiliares as $auxiliar)
							<option value="{{$auxiliar->ID_AUXILIAR}}">{{$auxiliar->NOMBRE_AUXILIAR.' '.$auxiliar->APELLIDO_AUXILIAR}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label> Selecionar Laboratorio: </label>
						<select name="ID_LABORATORIO" class="form-control" id="ID_LABORATORIO">
							@foreach($labs as $laboratorio)
							<option value="{{$laboratorio->ID_LABORATORIO}}">{{ $laboratorio->NOMBRE_LABORATORIO }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label> Selecionar Dia: </label>
						<select name="ID_DIA" class="form-control" id="ID_DIA">
							@foreach($dias as $dia)
							<option value="{{$dia->ID_DIA}}">{{$dia->NOMBRE_DIA}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Seleccionar Hora: </label>
						<select name="ID_HORA" id="ID_HORA" class="form-control">
							@foreach($horas as $hora)
							<option value="{{$hora->ID_HORA}}">{{$hora->HORA_INICIO.' - '.$hora->HORA_FIN}}</option>
							@endforeach
						</select>
					</div>
				</div>
							</div>
		</div>
		</form>
     	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="form-group">

				<button class="btn btn-primary" type="submit">Guardar</button>

				<button class="btn btn-danger" type="reset">Cancelar</button>
			{!!Form::close()!!}
			</div>
		</div>

	</div>
@endsection
