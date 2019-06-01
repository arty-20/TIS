@extends ('layouts.admin')
@section ('contenido')
 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Formulario para edición del docente:
        <p>{{$docente->NOMBRE_DOCENTE.' '.$docente->APELLIDO_DOCENTE}}</p></h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::model($docente,['method'=>'PATCH','route'=>['docente.update',$docente->ID_DOCENTE]])!!}
        {{Form::token()}}
        

        <div class="form-group">
            <label for="contrasenia">Contraseña</label>
            <input type="password" class="form-control" name="CONTRASENIA" value="{{$docente->CONTRASENIA}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="EMAIL" value="{{$docente->EMAIL}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombres</label>
            <input type="text" name="NOMBRE_DOCENTE" class="form-control" value="{{$docente->NOMBRE_DOCENTE}}">
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos</label>
            <input type="text" name="APELLIDO_DOCENTE" class="form-control" value="{{$docente->APELLIDO_DOCENTE}}">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="TELEFONO" value="{{$docente->TELEFONO}}">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="/administrador/docente">Volver</a></h4>
</div>
@endsection