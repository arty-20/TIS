@extends ('layouts.administrador')
@section ('contenidoadmin')
        
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Control de Horarios de Laboratorio</h3>
        </div>
    </div>
    

    <div>
        <nav class="navbar navbar-toggler navbar-lg navbar-dark bg-dark" style="background:#0C05D3" width="400px">
            @foreach ($laboratorio as $lab)
        <a class="navbar-brand"  href="{{URL::action('Administrador\HorarioController@listar',$lab->ID_LABORATORIO)}}">{{$lab->NOMBRE_LABORATORIO}}</a>  
            @endforeach           
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    @yield('labos')
    </div>
    </div>
 
        
     
@endsection