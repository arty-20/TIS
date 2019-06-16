@extends('layouts.docente')
@section('contenido')
    
<div class="rows">
  <div class="panel panel-primary clasee"  >
    <div class="panel-body">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="form">
        {!!Form::model($portafolio,['method'=>'PATCH','route'=>['grupoLaboratorio.update',$portafolio->ID_PORTAFOLIO]])!!}
        {{Form::token()}} 
        <input type="hidden" name="ID_PRAC_GRUPO" value="{{ $portafolio->ID_PRAC_GRUPO}}">
          <div class="form-group ">
            <h4>{{$portafolio->NOMBRE_SESION}}</h4>
            
            <h5 for="NOTA_DOCENTE"><b>ASIGNAR NOTA PARA : </b></h5>
            <h5>{{$portafolio->RUTA_ARCHIVO}}</h5>
            <input type="number" id="NOTA_DOCENTE"  name="NOTA_DOCENTE" class="form-control">
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <button class="btn btn-primary mb-2 col-auto" type="submit">Enviar</button>
          
      </div>
      
      {!!Form::close()!!}  
</div>

@endsection