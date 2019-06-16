@extends('layouts.estudiante')
@section('inscripcion-estudiante')
<center><h1><strong>Calificaciones</strong></h1></center>
</table>
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre Sesión</th>
      <th scope="col">Comentario Auxiliar</th>
      <th scope="col">Nota Docente</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comentario as $c)
      <div></div>
    
    <tr>
      <td>{{$c->NOMBRE_SESION}}</td>
      <td>{{$c->COMENTARIO_AUXILIAR}}</td>
      <td>{{$c->NOTA_DOCENTE}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div align="center"><a href="{{asset('estudiante/inscripcion')}}"><button class="btn btn-danger">Atrás</button></a>
</div>
@endsection