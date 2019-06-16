@extends('layouts.docente')
@section('arbol')
<li class="treeview"> 
@foreach ($sesiones as $ses)
    <li><a href="{{URL::action('docente\PracticaGrupoController@mostrarSesion',
               array('glab'=>$ses->ID_GRUPOLAB, 'est'=>$datos->ID_ESTUDIANTE,'idPrac'=>$ses->ID_PRAC_GRUPO))}}"><i class="fa fa-circle-o"></i>{{$ses->NOMBRE_SESION}}</a>
     </li>
 @endforeach
  </li>
@endsection
@section('contenido')
<h2>Estudiante: {{$datos->NOMBRE_ESTUDIANTE}} {{$datos->APELLIDO_ESTUDIANTE}}</h2>

<div class="row">
  <div class="col-md-12">
  <div class="table-responsive clasee" >
       <h5> <b>Lista de arhivos del estudiante para la sesion: </b></h5>
    <table class="table table-striped table-bordered table-condensed table-hover">
       <thead  style="background-color:#A9D0F5">
             <th>Sesion</th>
             <th>Archivos Subidos</th>
             <th>Comentario Auxiliar</th>
             <th>Nota</th>
             <th>OPCIONES</th>
       </thead>
        @foreach ($portafolio as $por)
        <tr>
              <td>{{ $por->NOMBRE_SESION }}</td>
               <td>{{ $por->RUTA_ARCHIVO }}</td>
               <td>{{ $por->COMENTARIO_AUXILIAR }}</td>
               <td>{{ $por->NOTA_DOCENTE }}</td>
               <td><a href="{{URL::action('docente\PracticaGrupoController@descargarArchivoEstudiante',array('id'=>$por->ID_PORTAFOLIO,
                      'ruta'=>$por->RUTA_ARCHIVO))}}"><button class="btn btn-info">Descargar Archivo </button>
                      </a>
                      <a href="{{URL::action('docente\PracticaGrupoController@editarNota',array('id'=>$por->ID_PORTAFOLIO))}}"><button class="btn btn-primary">Editar Nota</button>
                      </a>
                </td>
           </tr>
           @endforeach
       </table>
</div>
  </div>
</div>

@endsection