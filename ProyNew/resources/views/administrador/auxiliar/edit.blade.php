@extends ('layouts.admin')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para edición del auxiliar:{{$auxiliar->NOMBRE_AUXILIAR}}</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::model($auxiliar,['method'=>'PATCH','route'=>['auxiliar.update',$auxiliar->ID_AUXILIAR]])!!}
        {{Form::token()}}
        
        <div>
            <label for="contrasenia">Contraseña</label>
            <input type="text" name="CONTRASENIA" value="{{$auxiliar->CONTRASENIA}}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="EMAIL" value="{{$auxiliar->EMAIL}}">
        </div>
        <div>
            <label for="nombre">Nombres</label>
            <input type="text" name="NOMBRE_AUXILIAR" value="{{$auxiliar->NOMBRE_AUXILIAR}}">
        </div>
        <div>
            <label for="apellido">Apellidos</label>
            <input type="text" name="APELLIDO_AUXILIAR" value="{{$auxiliar->APELLIDO_AUXILIAR}}">
        </div>
        <div>
            <button type="submit">Guardar</button>
            <button type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="/administrador/auxiliar">Volver</a></h4>
</div>
@endsection