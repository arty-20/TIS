@extends('estudiante.inscripcion.sesionMateria.principal')
@section('sesionMateria')
    
<div class="container">
    <div align="center"><h1>Archivos del Estudiante</h1></div>
      <div class="list-group">
        <table class="table table-striped">
          @foreach($paquete as $p )
            <tr>
              <td>{{$p->RUTA_ARCHIVO}}</td>
              <td>
                <a href="{{URL::action('estudiante\SesionMateriaController@descargar',array('id'=>$p->ID_PORTAFOLIO,
                          'ruta'=>$p->RUTA_ARCHIVO))}}">
                          <button class = "btn btn-primary">Descargar</button>
                </a>
              </td>
            </tr>
          @endforeach
        </table>
              <div align="center">
                @include('estudiante.inscripcion.sesionMateria.prueba')
              </div>
      </div>
      
    </div>  
</div> 

@endsection
 
 