@extends ('layouts.admin')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para creación de nueva gestión</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/gestion','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        

        <div>
            <label for="nombre">Nombre de la gestión</label>
            <input type="text" name="NOMBRE_GESTION" placeholder="Ingrese el nombre de la gestión">
        </div>
        <div>
            <label for="inicio_gestion">Inicio de gestión</label>
            <input type="date" name="INICIO_GESTION">
        </div>
        <div>
            <label for="fin_gestion">Fin de gestión</label>
            <input type="date" name="FIN_GESTION">
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