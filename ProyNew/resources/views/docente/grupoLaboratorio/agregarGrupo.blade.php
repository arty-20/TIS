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
{!!Form::open(array('url'=>'docente','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<h2>Nuevo Grupo</h2>
<div class="rows">
 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<div class="form-group ">
      <label for="nombreMateria">Nombre de la Materia</label>
      <input hidden name="ID_DOC_MAT" value="{{$materia->ID_DOCENTE_MATERIA}}">
      <input type="text" class="form-control" value ="{{$materia->NOMBRE_MATERIA}}" disabled >

    </div>
  </div>
</div>
 <div class="rows">
	<div class="panel panel-primary">
	<div class="panel-body">
	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="form-group ">
		<label>Laboratorio: </label>
		<select name="ID_LABORATORIO" id="ID_LABORATORIO" class="laboratorio" >
			<option value="" disabled="true" selected="true"> Sleccionar laboratorio</option>
			@foreach($labs as $laboratorio)
				<option value="{{$laboratorio->ID_LABORATORIO}}" >{{ $laboratorio->NOMBRE_LABORATORIO }}</option>
			@endforeach
		</select>
	 </div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	<div class="form-group ">
		<label> Dia: </label>
		<select name="ID_DIA" id="ID_DIA" class="dia" >
			<option value="" disabled="true" selected="true">Seleccionar dia</option>
		</select>
	</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	<div class="form-group ">
		<label> Horario: </label>
		<select name="ID_HORA" id="ID_HORA" class="hora">
			<option value="" disabled="true" selected="true">Seleccionar horario</option>
		</select>
	</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	<div class="form-group">
		<label> Auxiliar: </label>
		<select name="ID_AUX" id="ID_AUX" class="auxiliar" >
				@foreach($auxiliares as $auxiliar)
				<option value="{{$auxiliar->ID_AUXILIAR}}">{{ $auxiliar->NOMBRE_AUXILIAR }} {{$auxiliar->APELLIDO_AUXILIAR}}</option>
				@endforeach
		</select>
	</div>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	
	</div>
{!!Form::close()!!}
</div>
</div>

</div>


<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">

	

	$(document).ready(function(){
		$(document).on('change','.laboratorio',function(){
			
			var id_lab=$(this).val();
			 console.log(id_lab);
			var div=$(this).parent();
 			console.log(div);
			var op=" ";

			$.ajax({
				type:'GET',
				url:'{!!URL::to('findDia')!!}',
				data:{'id':id_lab},
				success:function(data){
					console.log(data);
					op+='<option value="0" disabled selected > Seleccionar Dia: </option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].ID_DIA+'">'+data[i].NOMBRE_DIA+'</option>';
				   }
				   	$(".dia").html("");
				   $(".dia").append(op);
			},
				error:function(){

				}
			});
		});

	
		$(document).on('change','.dia',function () {
			var id_lab = $(".laboratorio").val();
			var id_dia=$(this).val();
			console.log(id_dia);
			var a=$(this).parent();
			console.log(id_lab);
			var op="";

			$.ajax({
				type:'GET',
				url:'{!!URL::to('findHoras')!!}',
				data:{'idDia':id_dia, 'idLab':id_lab},
				dataType:'json',//return data will be json
				success:function(p){
					console.log("horas");
					console.log(p.HORA_INICIO);
					op+='<option value="0" >Seleccionar horario: </option>';
						for(var i=0;i<p.length;i++){
						op+='<option value="'+p[i].ID_HORA+'">'+p[i].HORA_INICIO+' - '+p[i].HORA_FIN+'</option>';
					 }
					$(".hora").html("");
				   $(".hora").append(op);
					
				},
				error:function(){

				}
			});
		});
		$(document).on('change','.hora',function () {
			
			var id_dia=$(".dia").val();
			var id_hora = $(".hora").val();
			console.log(id_dia);
			var c=$(this).parent();
			console.log(id_hora);
			var op="";

			$.ajax({
				type:'GET',
				url:'{!!URL::to('findAuxiliares')!!}',
				data:{'idDia':id_dia, 'idHora':id_hora},
				dataType:'json',//return data will be json
				success:function(p){
					console.log("horas");
					console.log(p.HORA_INICIO);
					op+='<option value="0" >Seleccionar horario: </option>';
						for(var i=0;i<p.length;i++){
						op+='<option value="'+p[i].ID_HORA+'">'+p[i].HORA_INICIO+' - '+p[i].HORA_FIN+'</option>';
					 }
					$(".hora").html("");
				   $(".hora").append(op);
					
				},
				error:function(){

				}
			});
		});
	});

</script>

@endsection



