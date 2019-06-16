@extends('estudiante.inscripcion.sesionMateria.principal')
@section('sesionMateria')
  <div class="container">
    <div align="center">
      <h1>Práctica de la Sesión</h1>
    </div>
      
      <table class="table table-responsive">
        <tr>
          <th>{{$practica}}</th>
          <th>
            <a href="{{URL::action('estudiante\SesionMateriaController@descargarPractica',
                          array('idprac'=>$idPrac,
                          'idDocente'=>$idDocente,
			                    'i'=>$i,
                          'ruta'=>$practica))}}" >
              <button class="btn btn-primary mb-2">Descargar</button>
            </a>
          </th>
        </tr>
      </table>
  </div>

@endsection