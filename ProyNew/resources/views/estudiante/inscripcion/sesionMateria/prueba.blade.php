
@if(count($errors)>0)
  <div>
      <ul>
      @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
      @endforeach                
      </ul>
  </div>
@endif
        
<div class="form">
{!!Form::open(array('url'=>'estudiante/inscripcion/sesionMateria','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
  {{Form::token()}}
  <div class="form-row align-items-center">
    <input type="hidden" name="ID_PORTAFOLIO" value="{{$idpor}}">
    <div class="col-auto">
      <div class="form-group mx-sm-3 mb-2">
          <label for="file">Archivo de Clase</label>
          <input type="file" name="archivo" class="form-control-file">
      </div>
    </div>
    <div class="col-auto">
      <button class="btn btn-primary mb-2 col-auto" type="submit">Enviar</button>
    </div>
  </div>
{!!Form::close()!!}
</div>
 