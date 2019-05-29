@extends ('layouts.admin')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para creación de docente</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/docente','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        

        <div>
            <label for="contrasenia">Contraseña</label>
            <input type="password" name="CONTRASENIA" placeholder="Ingrese la contrasenia">
        </div>
        <div>
            <label for="contrasenia">Repita la Contraseña</label>
            <input type="password" name="CONTRASENIA_CONFIRMATION" placeholder="Repita la contrasenia">
        </div>
        <div>
            <label for="EMAIL">Email</label>
            <input type="email" name="EMAIL" placeholder="Ingrese el email">
        </div>
        <div>
            <label for="nombre">Nombres</label>
            <input type="text" name="NOMBRE_DOCENTE" placeholder="Ingrese el/los nombre/s">
        </div>
        <div>
            <label for="apellido">Apellidos</label>
            <input type="text" name="APELLIDO_DOCENTE" placeholder="Ingrese los apellidos">
        </div>
        <div>
            <label for="telefono">Teléfono</label>
            <input type="text" name="TELEFONO" placeholder="Ingrese el teléfono">
        </div>
        <div>
            <label for="codigo">Código de Docente</label>
            <input type="text" name="CODIGO_DOCENTE" placeholder="Ingrese el código">
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