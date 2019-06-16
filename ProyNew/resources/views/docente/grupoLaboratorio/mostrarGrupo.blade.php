@extends('layouts.docente')
@section('arbol')
  <li class="treeview">
  @foreach($grupos as $grupo)
       	@if($grupo->ESTADO_GC == 1)
        <li><a href="{{URL::action('docente\PracticaGrupoController@mostrarGrupo',array('id'=>$grupo->ID_GRUPOLAB,'idM'=>$materia->ID_MATERIA))}}"><i class="fa fa-circle-o"></i>{{$grupo->NOMBRE_DIA}}  {{$grupo->HORA_INICIO}} - {{$grupo->HORA_FIN}}</a>
      </li>
        @endif
     @endforeach
  </li>
  <li class="treeview">
    <a href="{{URL::action('docente\PracticaGrupoController@reporte',$materia->ID_MATERIA)}}">
      <i class="fa fa-file-text-o"></i>
      <span>ver Reportes</span>
    </a>
  </li>
@endsection


@section('contenido')

<h2><b>{{$grupoLaboratorio->NOMBRE_MATERIA}}</b></h2>
<h5>{{$grupoLaboratorio->NOMBRE_LABORATORIO}}</h5>
<h5>{{$grupoLaboratorio->GRUPOLAB}}</h5>
<h5>{{'Auxiliar Designado: '.$grupoLaboratorio->NOMBRE_AUXILIAR.' '.$grupoLaboratorio->APELLIDO_AUXILIAR}}</h5>
 
<button type="button" name="lista"  id="lista" class="btn btn-primary">Ver Lista de Estudiantes</button>
<button type="submit" name="practica" id="practica" class="btn btn-secondary">Añadir practica</button>

<div class="rows">
  <div class="panel panel-primary clasee" id="aniadir" hidden>
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
<div class="rows">
 
 <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
     <div class="table-responsive clasee" >
       <h5> <b>Lista de practicas asignadas al grupo</b></h5>
       <table class="table table-striped table-bordered table-condensed table-hover" id="listar_practica" >
       <thead  style="background-color:#A9D0F5">
             <th>Numero de Sesion</th>
             <th>Fecha Subida</th>
             <th>Practica</th>
             <th>Opciones</th>
       </thead>
       <?php $i = 1; ?>
        @foreach ($practicas as $prac)
           <tr>
               <td>{{ $prac->NOMBRE_SESION }}</td>
               <td>{{ $prac->FECHA }}</td>
               <td>{{ $prac->PRACTICA}}</td>
               <td><a href="{{URL::action('docente\PracticaGrupoController@descargar',
               array('id'=>$grupoLaboratorio->ID_GRUPOLAB, 'archivo'=>$prac->PRACTICA,'i'=>$i))}}"><button class="btn btn-info">Descargar</button></a></td>
           </tr>
           <?php $i++; ?>
           @endforeach
       </table>
     </div>
 </div>
</div>

    </div>

</div>


<div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
       <div class="table-responsive clasee">
        <table class="table table-striped table-bordered table-condensed table-hover" id="estudiante_listar" hidden >
        <thead  style="background-color:#A9D0F5">
              <th>Codigo SIS</th>
              <th>Nombre Estudiante</th>
              <th>Opciones</th>
        </thead>
         @foreach ($estudiantes as $est)
            <tr>
                <td>{{ $est->CODIGO_SIS}}</td>
                <td>{{ $est->APELLIDO_ESTUDIANTE.' '.$est->NOMBRE_ESTUDIANTE}}</td>
                <td><a href="{{URL::action('docente\PracticaGrupoController@mostrarPortafolio',
               array('g'=>$grupoLaboratorio->ID_GRUPOLAB, 'id'=>$est->ID_ESTUDIANTE))}}"><button class="btn btn-info">Ver Portafolio</button></a></td>
            </tr>
            @endforeach
        </table>
      </div>
  </div>
</div>

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
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