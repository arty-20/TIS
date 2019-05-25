@extends('layouts.docente')
@section ('contenido')
 
<div>
    <div>
        <h3>Formulario para creación del auxiliar</h3>
        @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'docente/auxiliar','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
<div class="row">
    <div class="col-md-8">
         
             <form class="form-horizontal">
            
                <div class="form-group">
                  <label for="nombre" class="col-sm-2 control-label">Nombres</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="NOMBRE_AUXILIAR" placeholder="Ingrese el/los nombre/s">
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellido" class="col-sm-2 control-label">Apellidos</label>

                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="APELLIDO_AUXILIAR" placeholder="Ingrese los apellidos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="codigo" class="col-sm-2 control-label">Código SIS</label>

                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="CODIGO_SIS" placeholder="Ingrese el código SIS">
                  </div>
                </div>
                <div class="form-group">
                  <label for="contrasenia" class="col-sm-2 control-label">Contraseña</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="CONTRASENIA" placeholder="Ingrese la contrasenia">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="EMAIL" placeholder="Ingrese el email">
                  </div>
                </div>
              
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" >Guardar</button>
                <button type="reset" >Cancelar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

        {!!Form::close()!!}
    </div>


@endsection