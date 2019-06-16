@extends ('layouts.administrador')
@section ('contenidoadmin')
 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Formulario para edición del docente:
        <p>{{$docente->NOMBRE_DOCENTE.' '.$docente->APELLIDO_DOCENTE}}</p></h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::model($docente,['method'=>'PATCH','route'=>['docente.update',$docente->ID_DOCENTE]])!!}
        {{Form::token()}}
        

        <div class="form-group">
            <label for="email">Email(*)</label>
            <input type="email" class="form-control" name="EMAIL" value="{{$docente->EMAIL}}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombres(*)</label>
            <input type="text" name="NOMBRE_DOCENTE" class="form-control" value="{{$docente->NOMBRE_DOCENTE}}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos(*)</label>
            <input type="text" name="APELLIDO_DOCENTE" class="form-control" value="{{$docente->APELLIDO_DOCENTE}}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono(*)</label>
            <input type="number" class="form-control" name="TELEFONO" value="{{$docente->TELEFONO}}" required>
        </div>
        <div class="form-group">
            <p style="color:red;">Campos obligatorios(*)</p>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
        </div>
        {!!Form::close()!!}
        <div class="form-group">
        <a href="{{asset('administrador/docente')}}"><button class="btn btn-info" type="">Atrás</button></a>
        </div>
    </div>
</div>
@endsection