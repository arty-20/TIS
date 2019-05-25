@extends('layouts.estudiante')
@section('inscripcion-estudiante')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo estudiante</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(array('url'=>'estudiante','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
                <label for="NOMBRE_ESTUDIANTE">Nombre</label>
                <input type="text" name="NOMBRE_ESTUDIANTE" class="form-control" placeholder="nombre..." required>
            </div>
            <div class="form-group">
                <label for="APELLIDO_ESTUDIANTE">Apellidos</label>
                <input type="text" name="APELLIDO_ESTUDIANTE" class="form-control" placeholder="apellidos..." required>
            </div>
            <div class="form-group">
                <label for="CODIGO_SIS">Codigo SIS</label>
                <input type="number" name="CODIGO_SIS" class="form-control" placeholder="codigosis..." required>
            </div>
            <div class="form-group">
                <label for="EMAIL">Correo</label>
                <input type="email" name="EMAIL" class="form-control" placeholder="correo..." required>
            </div>
            <div class="form-group">
                <label for="CONTRASENIA">Contraseña</label>
                <input type="password" name="CONTRASENIA" class="form-control" placeholder="contrasenia..."required>
            </div>
            
            <div class="form-group">
                <label for="CONTRASENIA_confirmation">Confirmar Contraseña</label>
                <input type="password" name="CONTRASENIA_confirmation" class="form-control" placeholder="Confirme contrasenia..." required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            {!! Form::close()!!}
            <!-- <div>
            <a href="../inscripcion"><button class="btn btn-secondary">Atrás</button></a>
            </div> -->
        </div>
    </div>
@endsection
