@extends ('layouts.admin')
@section ('contenidoadmin')
 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Formulario para creación de docente</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/docente','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        

        <div class="form-group">
            <label for="contrasenia">Contraseña(*)</label>
            <input type="password" class="form-control" name="CONTRASENIA" placeholder="Ingrese la contrasenia">
        </div>
        <div class="form-group">
            <label for="contrasenia">Repita la Contraseña(*)</label>
            <input type="password" class="form-control" name="CONTRASENIA_CONFIRMATION" placeholder="Repita la contrasenia">
        </div>
        <div class="form-group">
            <label for="EMAIL">Email(*)</label>
            <input type="email" class="form-control" name="EMAIL" placeholder="Ingrese el email">
        </div>
        <div class="form-group">
            <label for="nombre">Nombres(*)</label>
            <input type="text" class="form-control" name="NOMBRE_DOCENTE" placeholder="Ingrese el/los nombre/s">
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos(*)</label>
            <input type="text" class="form-control" name="APELLIDO_DOCENTE" placeholder="Ingrese los apellidos">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono(*)</label>
            <input type="text" class="form-control" name="TELEFONO" placeholder="Ingrese el teléfono">
        </div>
        <div class="form-group">
            <label for="codigo">Código de Docente(*)</label>
            <input type="text" class="form-control" name="CODIGO_DOCENTE" placeholder="Ingrese el código">
        </div>
        
        <div class="form-group">
            <p style="color:red;">Campos obligatorios(*)</p>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button  class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="../docente">Volver</a></h4>
</div>
@endsection