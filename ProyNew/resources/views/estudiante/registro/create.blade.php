@extends('layouts.estudiante')
@section('inscripcion-estudiante')
    <div >
        <div >
            <div align="center"><h3>Registro de nuevo Estudiante</h3></div>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(array('url'=>'estudiante/registro','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="NOMBRE_ESTUDIANTE">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" name="NOMBRE_ESTUDIANTE" value="{{old('NOMBRE_ESTUDIANTE')}}" class="form-control" placeholder="Nombre..." required>
                </div>    
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="APELLIDO_ESTUDIANTE">Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" name="APELLIDO_ESTUDIANTE" value="{{old('APELLIDO_ESTUDIANTE')}}" class="form-control" placeholder="Apellidos..." required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="CODIGO_SIS">Codigo SIS</label>
                <div class="col-sm-10">
                <input type="number" name="CODIGO_SIS" value="{{old('CODIGO_SIS')}}" class="form-control" placeholder="Codigo SIS..." required>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label" for="EMAIL">Correo</label>
                <div class="col-sm-10">
                <input type="email" name="EMAIL" class="form-control" value="{{old('EMAIL')}}" placeholder="Correo..." required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label  for="CONTRASENIA">Contraseña</label>
                <input type="password" name="CONTRASENIA" class="form-control" placeholder="Contraseña..."required>
                </div>
            
                <div class="form-group col-md-6">
                <label for="CONTRASENIA_confirmation">Confirmar Contraseña</label>
                <input type="password" name="CONTRASENIA_confirmation" class="form-control" placeholder="Confirme Contraseña..." required>
                </div>
            </div>

            <div align="center" class="form-group">
                <button  type="submit" class="btn btn-primary">Guardar</button>
                
            </div>
            {!! Form::close()!!}
            <div align="center">
            <a  href="{{asset('/')}}"><button type="" class="btn btn-danger">Atrás</button></a>
            </div>
            <!-- <div>
            <a href="../inscripcion"><button class="btn btn-secondary">Atrás</button></a>
            </div> -->
        </div>
    </div>
@endsection
