@extends ('layouts.admin')
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
            <input type="text" class="form-control" name="NOMBRE_GESTION" placeholder="Ingrese el nombre de la gestión">
        </div>
        <div class="form-group">
            <label for="inicio_gestion">Inicio de gestión(*)</label>
            <input type="date" class="form-control" name="INICIO_GESTION">
        </div>
        <div class="form-group">
            <label for="fin_gestion">Fin de gestión(*)</label>
            <input type="date" class="form-control" name="FIN_GESTION">
        </div>
        <div class="form-group">
            <p style="color:red;">Campos obligatorios(*)</p>
        </div>
        <div class="formgroup">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div>
    <h4><a href="/administrador/gestion">Volver</a></h4>
</div>
@endsection