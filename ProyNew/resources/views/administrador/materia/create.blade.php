@extends ('layouts.admin')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para creación de nueva materia</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/materia','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        

        <div>
            <label for="nombre">Nombre de la materia</label>
            <input type="text" name="NOMBRE_MATERIA" placeholder="Ingrese el nombre de la materia">
        </div>
        <div>
            <button type="submit">Guardar</button>
            <button type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="../materia">Volver</a></h4>
</div>
@endsection