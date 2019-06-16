@extends ('layouts.administrador')
@section ('contenidoadmin')
 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Formulario para creación de docente</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/docente','method'=>'POST','autocomplete'=>'off'))!!}
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
            <label for="EMAIL">Email(*)</label>
            <input type="email" class="form-control" value="{{old('EMAIL')}}" name="EMAIL" placeholder="Ingrese el email" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombres(*)</label>
            <input type="text" class="form-control" value="{{old('NOMBRE_DOCENTE')}}" name="NOMBRE_DOCENTE" placeholder="Ingrese el/los nombre/s" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos(*)</label>
            <input type="text" class="form-control" value="{{old('APELLIDO_DOCENTE')}}" name="APELLIDO_DOCENTE" placeholder="Ingrese los apellidos" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono(*)</label>
            <input type="number" class="form-control" value="{{old('TELEFONO')}}" name="TELEFONO" placeholder="Ingrese el teléfono" required>
        </div>
        <div class="form-group">
            <label for="codigo">Código de Docente(*)</label>
            <input type="text" class="form-control" value="{{old('CODIGO_DOCENTE')}}" name="CODIGO_DOCENTE" placeholder="Ingrese el código" required>
        </div>
        
        <div class="form-group">
            <p style="color:red;">Campos obligatorios(*)</p>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
        </div>
        {!!Form::close()!!}
        <div class="form-group">
        <a href="{{asset('administrador/docente')}}">
            <button  class="btn btn-info" type="">Atrás</button></a>
        </div>
    </div>
</div>
@endsection