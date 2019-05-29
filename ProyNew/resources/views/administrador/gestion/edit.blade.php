@extends ('layouts.admin')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para edición de gestiones</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::model($gestion,['method'=>'PATCH','route'=>['gestion.update',$gestion->ID_GESTION]])!!}
        {{Form::token()}}
        
        <div>
            <label for="nombre">Nombre de la gestión</label>
            <input type="text" name="NOMBRE_GESTION" value="{{$gestion->NOMBRE_GESTION}}">
        </div>
        <div>
            <button type="submit">Guardar</button>
            <button type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="/administrador/gestion">Volver</a></h4>
</div>
@endsection