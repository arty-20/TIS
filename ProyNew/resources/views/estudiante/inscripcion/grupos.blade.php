@extends('layouts.estudiante')
@section('inscripcion-estudiante')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        @if($grupos == null && $id==null && $grupoLleno == null)
            <center><h1>Ya esta inscrito en este grupo</h1></center>
            <center><a href="{{asset('estudiante/inscripcion')}}"><button class="btn btn-primary">Volver a Inicio</button></a></center>
        @elseif($grupos == null && $id==null && $grupoLleno != null)
            <center><h1>{{$grupoLleno}}</h1></center>
            <center><a href="{{asset('estudiante/inscripcion')}}"><button class="btn btn-primary">Volver a Inicio</button></a></center>
        @else
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif 
            <center><h2>Inscribirse a un Grupo</h2></center>
            
            <div class="form-group">
            {!!Form::open(array('url'=>'estudiante/inscripcion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            
            <div class="form-group">
            <input type="hidden" name="ID_DOC_MAT" value="{{$id}}">
            <label for="ID_GRUPOLAB"><h4>Seleccione su horario:</h4></label>
            <select class="form-control" name="ID_GRUPOLAB">
            @foreach ($grupos as $g)
                @if($g->ESTADO_GC == 1)
                        <option value="{{$g->ID_GRUPOLAB}}">{{$g->HORA_INICIO}} - {{$g->NOMBRE_DIA}}</option>   
                @endif
            @endforeach
            </select>
            </div>
            <button class="btn btn-primary" type="submit">Inscribirse</button>
            {!!Form::close()!!}
            </div>
        @endif
        </div>
    </div>
@endsection