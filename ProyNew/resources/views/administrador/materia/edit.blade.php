@extends ('layouts.admin')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para edición de materias</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::model($materia,['method'=>'PATCH','route'=>['materia.update',$materia->ID_MATERIA]])!!}
        {{Form::token()}}
        
        <div>
            <label for="nombre">Nombre de la materia</label>
            <input type="text" name="NOMBRE_MATERIA" value="{{$materia->NOMBRE_MATERIA}}">
        </div>
        <div>
            <button type="submit">Guardar</button>
            <button type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="/administrador/materia">Volver</a></h4>
</div>
@endsection