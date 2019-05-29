@extends ('layouts.admin')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para creación del auxiliar</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/auxiliar','method'=>'POST','autocomplete'=>'off'))!!}
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
            <label for="email">Email</label>
            <input type="email" name="EMAIL" placeholder="Ingrese el email">
        </div>
        <div>
            <label for="nombre">Nombres</label>
            <input type="text" name="NOMBRE_AUXILIAR" placeholder="Ingrese el/los nombre/s">
        </div>
        <div>
            <label for="apellido">Apellidos</label>
            <input type="text" name="APELLIDO_AUXILIAR" placeholder="Ingrese los apellidos">
        </div>
        <div>
            <label for="codigo">Código SIS</label>
            <input type="text" name="CODIGO_SIS" placeholder="Ingrese el código SIS">
        </div>
        <div>
            <button type="submit">Guardar</button>
            <button type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="../auxiliar">Volver</a></h4>
</div>
@endsection