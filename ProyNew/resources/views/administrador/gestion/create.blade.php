@extends ('layouts.administrador')
@section ('contenidoadmin')
 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Formulario para creación de gestiones</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'administrador/gestion','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        

        <div class="form-group">
            <label for="nombre">Nombre de la gestión(*)</label>
            <input type="text" class="form-control" value="{{old('NOMBRE_GESTION')}}" name="NOMBRE_GESTION" placeholder="Ingrese el nombre de la gestión" required>
        </div>
        <div class="form-group">
            <label for="inicio_gestion">Inicio de gestión(*)</label>
            <input type="date" class="form-control" value="{{old('INICIO_GESTION')}}" name="INICIO_GESTION" required>
        </div>
        <div class="form-group">
            <label for="fin_gestion">Fin de gestión(*)</label>
            <input type="date" class="form-control" name="FIN_GESTION" value="{{old('FIN_GESTION')}}" required>
        </div>
        <div class="form-group">
            <p style="color:red;">Campos obligatorios(*)</p>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
            
        </div>
        {!!Form::close()!!}
        <div class="form-group">
        <a href="{{asset('administrador/gestion')}}"><button class="btn btn-info" type="">Atrás</button></a>
        </div>
    </div>
</div>
@endsection