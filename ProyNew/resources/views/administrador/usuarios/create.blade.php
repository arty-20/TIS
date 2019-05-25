@extends('layouts.admin')
@section('contenido')

<div>
	<div>
		@if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif

        <div class="container">
            <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <div class="panel-heading"><h3>Formuario de Registro</h3></div>
    {!!Form::open(array('url'=>'administrador/usuarios','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
                    
            <div class="panel-body">
                        
                <div class="form-group{{ $errors->has('NOMBRE') ? ' has-error' : '' }}">
                <label for="NOMBRE" class="col-md-4 control-label">Nombre</label>
                    <div class="col-md-6">
                        <input type="text" id="NOMBRE" class="form-control" name="NOMBRE" value="{{old('NOMBRE')}}" required autofocus>
                        @if ($errors->has('NOMBRE'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('NOMBRE') }}</strong>
                                    </span>
                        @endif
                    </div>            
                </div>
                
                <div class="form-group{{ $errors->has('APELLIDO') ? ' has-error' : '' }}">
                <label for="APELLIDO" class="col-md-4 control-label">Apellido</label>
                    <div class="col-md-6">
                        <input type="text" id="APELLIDO" class="form-control" name="APELLIDO" value="{{old('APELLIDO')}}" required>
                        @if ($errors->has('APELLIDO'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('APELLIDO') }}</strong>
                                    </span>
                        @endif
                    </div>            
                </div>


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="EMAIL" class="col-md-4 control-label">Correo Electrónico</label>

                    <div class="col-md-6">
                        <input id="EMAIL" type="email" class="form-control" name="EMAIL" value="{{ old('EMAIL') }}" required>

                                @if ($errors->has('EMAIL'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('EMAIL') }}</strong>
                                    </span>
                                @endif
                    </div>
            </div>

                    <div class="form-group{{ $errors->has('CONTRASENIA') ? ' has-error' : '' }}">
                    <label for="CONTRASENIA" class="col-md-4 control-label">Contraseña</label>

                    <div class="col-md-6">
                        <input id="CONTRASENIA" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                   </div>


        </div>

            </div>
            </div>
            </div>
        </div>		
	</div>
</div>



@endsection