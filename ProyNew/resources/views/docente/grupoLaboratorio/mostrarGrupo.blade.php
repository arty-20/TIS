@extends('layouts.docente')

@section('contenido')

<h2><b>{{$grupoLaboratorio->NOMBRE_MATERIA}}</b></h2>
<h5>{{$grupoLaboratorio->GRUPOLAB}}</h5>
<h5>{{'Auxiliar Designado: '.$grupoLaboratorio->NOMBRE_AUXILIAR.' '.$grupoLaboratorio->APELLIDO_AUXILIAR}}</h5>
<a href="{{URL::action('docente\DocenteController@listarEstudiantes',$grupoLaboratorio->ID_GRUPOLAB)}}"><h5>Lista de Estudiantes</h5></a>
 
<button type="button" name="lista"  id="lista" class="btn btn-primary">Ver Lista de Estudiantes</button>
<button type="submit" name="practica" id="practica" class="btn btn-secondary">Añadir practica</button>

<div class="rows">
  <div class="panel panel-primary" id="aniadir" hidden>
    <div class="panel-body">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="form">
          
        {!!Form::open(array('url'=>'docente/grupoLaboratorio','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        <input type="hidden" name="ID_PRAC_GRUPO" value="{{ $idLab }}">
          <div class="form-group ">
            <h5 for="archivo"><b>SUBIR NUEVA PRACTICA: </b></h5>
            <input type="file" name="archivo" class="form-control-file">
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <button class="btn btn-primary mb-2 col-auto" type="submit">Enviar</button>
          
       </div>
        {!!Form::close()!!}  
      </div>
    </div>

</div>
<div class="row">
 
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
       <h5> Lista de practicas asignadas al grupo</h5>
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover" id="listar_practica" >
        <thead  style="background-color:#A9D0F5">
              <th>Numero de Sesion</th>
              <th>Fecha Subida</th>
              <th>Practica</th>
              <th>Opciones</th>
        </thead>
         @foreach ($practicas as $prac)
            <tr>
                <td>{{ $prac->NOMBRE_SESION }}</td>
                <td>{{ $prac->FECHA }}</td>
                <td>{{ $prac->PRACTICA}}</td>
                <td><a href="#"><button class="btn btn-info">Descargar</button></a></td>
            </tr>
            @endforeach
        </table>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
       <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover" id="estudiante_listar" hidden >
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

<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#lista').click(function(){
      if ($('#estudiante_listar').attr('hidden')) {
        $('#estudiante_listar').removeAttr('hidden');
      }else{
         $('#estudiante_listar').attr('hidden','true');
      }
        
    });
});

$(document).ready(function(){
    $('#practica').click(function(){
      if ($('#aniadir').attr('hidden')) {
        $('#aniadir').removeAttr('hidden');
      }else{
         $('#aniadir').attr('hidden','true');
      }
        
    });
  });
</script>




@endsection

