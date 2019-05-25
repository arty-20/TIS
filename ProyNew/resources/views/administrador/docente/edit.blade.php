@extends ('layouts.admin')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para edición de docente: {{$docente->NOMBRE_DOCENTE}}</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::model($docente,['method'=>'PATCH','route'=>['docente.update',$docente->ID_DOCENTE]])!!}
        {{Form::token()}}
        

        <div>
            <label for="contrasenia">Contraseña</label>
            <input type="text" name="CONTRASENIA" value="{{$docente->CONTRASENIA}}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="EMAIL" value="{{$docente->EMAIL}}">
        </div>
        <div>
            <label for="nombre">Nombres</label>
            <input type="text" name="NOMBRE_DOCENTE" value="{{$docente->NOMBRE_DOCENTE}}">
        </div>
        <div>
            <label for="apellido">Apellidos</label>
            <input type="text" name="APELLIDO_DOCENTE" value="{{$docente->APELLIDO_DOCENTE}}">
        </div>
        <div>
            <label for="telefono">Teléfono</label>
            <input type="text" name="TELEFONO" value="{{$docente->TELEFONO}}">
        </div>
        <div>
            <button type="submit">Guardar</button>
            <button type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="../docente">Volver</a></h4>
</div>
@endsection