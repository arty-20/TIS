@extends('layouts.docente')
@section('arbol')
<li class="treeview"> 
@foreach ( $sesiones as $ses)
    <li id="{{$ses->ID_PRAC_GRUPO}}"><a href="{{URL::action('docente\PracticaGrupoController@mostrarSesion',
               array('glab'=>$ses->ID_GRUPOLAB, 'est'=>$datos->ID_ESTUDIANTE,'idPrac'=>$ses->ID_PRAC_GRUPO))}}"><i class="fa fa-circle-o"></i>{{$ses->NOMBRE_SESION}}</a>
     </li>
 @endforeach
  </li>
@endsection
