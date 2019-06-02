@extends ('layouts.admin')
@section ('contenido')
 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Formulario para creación materias</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/materia','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        

        <div class="form-group">
            <label for="nombre">Nombre de la materia</label>
            <input type="text" class="form-control" name="NOMBRE_MATERIA" placeholder="Ingrese el nombre de la materia">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="/administrador/materia">Volver</a></h4>
</div>
@endsection