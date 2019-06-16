@extends ('layouts.administrador')
@section ('contenidoadmin')
 
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
            <label for="nombre">Nombre de la materia(*)</label>
            <input type="text" class="form-control" name="NOMBRE_MATERIA" value="{{old('NOMBRE_MATERIA')}}" placeholder="Ingrese el nombre de la materia" required>
        </div>
        <div class="form-group">
            <p style="color:red;">Campos obligatorios(*)</p>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
        </div>
        {!!Form::close()!!}
        <div class="form-group">
        <a href="{{asset('administrador/materia')}}">
            <button class="btn btn-danger" type="">Atrás</button></a>
        </div>
    </div>
</div>
@endsection