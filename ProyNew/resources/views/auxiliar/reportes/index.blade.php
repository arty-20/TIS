@extends ('layouts.admin0')
@section ('contenido')

<br>
@foreach($grupos as $g)
<br>
<h4>GRUPO {{$g->NOMBRE_DIA}} - {{$g->HORA_INICIO}}-{{$g->HORA_FIN}}</h4>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Codigo Sis</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nombre</th>
      <th scope="col">Asistencia</th>
      <th scope="col">Nota Portafolio</th>
    </tr>
  </thead>
<tbody>
<?php $i = 1; ?>
@foreach($estudiantes as $est)
  @if($est->ID_GRUPOLAB == $g->ID_GRUPOLAB)
  <tr>
    <th scope="row">{{$i}}</th>
    <td>{{$est->CODIGO_SIS}}</td>
    <td>{{$est->APELLIDO_ESTUDIANTE}}</td>
    <td>{{$est->NOMBRE_ESTUDIANTE}}</td>
    <td>{{$est->CANTIDAD}}</td>
    <td>{{$est->PROMEDIO}}</td>
  </tr>
  <?php $i++; ?>
 @endif

 @endforeach
  </tbody>

</table>
<p>Cantidad total de alumnos: {{$i-1}}</p>
@endforeach

<div class="row btn-a">
</div>
@endsection
