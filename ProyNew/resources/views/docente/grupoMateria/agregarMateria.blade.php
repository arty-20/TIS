@extends('layouts.docente')

@section('contenido')
<h3><b> Materias</b></h3>

<div class="row">    
 <div class="cards">   
  <div class="card-columns">
    @foreach($materias as $materia)
    {!!Form::open(array('url'=>'docente/materias','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="card">
      <div class="card-body">
        <div class="info-box bx">
            <span class="info-box-icon" ><i class="fa fa-fw fa-users"></i></span>
              <span class="info-box-number bx">
              <input type="hidden" name="ID_MATERIA" value="{{$materia->ID_MATERIA}}">{{$materia->NOMBRE_MATERIA}}</span>
                        
        </div> 
          <button type="submit" class="btn btn-secondary">Agregar Materia</button>
          {!!Form::close()!!}
      </div>
      
    </div>
     @endforeach
  
 </div>  
 </div>  
 </div> 
          
 @endsection