@extends('layouts.docente')
@section('arbol')
  <li class="treeview">
    <a href="{{asset('docente/docente')}}">
      <i class="fa fa-folder"></i>
      <span>Materias Registradas</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
     <ul class="treeview-menu">
       @foreach($materias as $materia)
        <li><a href="{{URL::action('docente\DocenteController@listarGrupos',
                array('idMateria'=>$materia->ID_MATERIA, 'idDocente'=>$materia->ID_DOCENTE))}}"><i class="fa fa-circle-o"></i>{{$materia->NOMBRE_MATERIA}}</a>
        </li>
     @endforeach
    </ul>
  </li>
 
@endsection

@section('contenido')
<h3><b> Materias Registradas</b></h3>

<div class="row">    
<div class="cards">   
  <div class="card-columns">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title bx"><b>Agregar Materia</b></h5>
      <a href="{{URL::action('docente\DocenteController@agregarMateria',array('idDocente'=>$idD))}}">
        <center>
            <img  src="{{ asset('/img/mas.png') }}" alt="Más" width="70">
        </center>
      </a>
      </div>
    </div>

@foreach($materias as $materia)
    <div class="card">
      <div class="card-body">
        <div class="info-box bx"><a style=" color: #33313b;" href="{{URL::action('docente\DocenteController@listarGrupos',
            array('idMateria'=>$materia->ID_MATERIA, 'idDocente'=>$materia->ID_DOCENTE))}}">
            <span class="info-box-icon" ><i class="fa fa-fw fa-users"></i></span>
              <div class="info-box-content">
              
              <span class="info-box-number bx">{{$materia->NOMBRE_MATERIA}}</span>
            </div>
          </a>  
        </div> 

      </div>
    </div>
  
    @endforeach
  
 </div>  
 </div>    
          
 @endsection