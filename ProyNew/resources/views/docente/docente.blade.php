
@extends('layouts.docente')
@section('contenido')
<h3><b> Materias Registradas</b></h3>

<div class="row">    
<div class="cards">   
  <div class="card-columns">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title bx"><b>Agregar Materia</b></h5>
      <a href="#">
        <center>
            <img  src="{{ asset('/img/mas.png') }}" alt="Más" width="70">
        </center>
      </a>
      </div>
    </div>

@foreach($materias as $materia)
    <div class="card">
      <div class="card-body">
        <div class="info-box bx"><a style=" color: #33313b;" href="#">
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