@extends ('layouts.administrador')
@section ('contenidoadmin')
 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Formulario para creación del auxiliar</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/auxiliar','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        

        <div class="form-group">
            <label for="contrasenia">Contraseña(*)</label>
            <input type="password" class="form-control" name="CONTRASENIA" placeholder="Ingrese la contraseña" required>
        </div>
        <div class="form-group">
            <label for="contrasenia">Repita la Contraseña(*)</label>
            <input type="password" class="form-control" name="CONTRASENIA_CONFIRMATION" placeholder="Repita la contraseña" required>
        </div>
        <div class="form-group">
            <label for="email">Email(*)</label>
            <input type="email" class="form-control" value="{{old('EMAIL')}}" name="EMAIL" placeholder="Ingrese el email" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombres(*)</label>
            <input type="text" class="form-control" value="{{old('NOMBRE_AUXILIAR')}}" name="NOMBRE_AUXILIAR" placeholder="Ingrese el/los nombre/s" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos(*)</label>
            <input type="text" class="form-control" value="{{old('APELLIDO_AUXILIAR')}}" name="APELLIDO_AUXILIAR" placeholder="Ingrese los apellidos" required>
        </div>
        <div class="form-group">
            <label for="codigo">Código SIS(*)</label>
            <input type="number" class="form-control" name="CODIGO_SIS" value="{{old('CODIGO_SIS')}}" placeholder="Ingrese el código SIS" required>
        </div>
        <div class="form-group">
            <p style="color:red;">Campos obligatorios(*)</p>
        </div>
        <div class="form-group">
            <button  class="btn btn-success" type="submit">Guardar</button>
        </div>
        {!!Form::close()!!}
        <div class="form-group">
        <a href="{{asset('administrador/auxiliar')}}"><button class="btn btn-info" type="">Atrás</button></a>
        </div>
    </div>
</div>
@endsection