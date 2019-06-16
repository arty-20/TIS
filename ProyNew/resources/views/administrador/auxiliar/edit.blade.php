@extends ('layouts.administrador')
@section ('contenidoadmin')
 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Formulario para edición del auxiliar:
        <p>{{$auxiliar->NOMBRE_AUXILIAR.' '.$auxiliar->APELLIDO_AUXILIAR}}</p></h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::model($auxiliar,['method'=>'PATCH','route'=>['auxiliar.update',$auxiliar->ID_AUXILIAR]])!!}
        {{Form::token()}}
        
        <div class="form-group">
            <label for="email">Email(*)</label>
            <input type="text" class="form-control" name="EMAIL" value="{{$auxiliar->EMAIL}}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombres(*)</label>
            <input type="text" class="form-control" name="NOMBRE_AUXILIAR" value="{{$auxiliar->NOMBRE_AUXILIAR}}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos(*)</label>
            <input type="text" class="form-control" name="APELLIDO_AUXILIAR" value="{{$auxiliar->APELLIDO_AUXILIAR}}" required>
        </div>
        
        <div class="form-group">
            <p style="color:red;">Campos obligatorios(*)</p>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
        </div>
        {!!Form::close()!!}
        <div class="form-group">
        <a href="{{asset('administrador/auxiliar')}}"><button class="btn btn-info" type="">Atrás</button></a>
        </div>
    </div>
</div>
@endsection