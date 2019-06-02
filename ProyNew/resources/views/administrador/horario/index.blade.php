@extends ('layouts.admin')
@section ('contenido')
        
    <div>
        <div>
            <h3>Control de Horarios de Laboratorio</h3>
        </div>
    </div>
    <div>
        <nav>
            @foreach ($laboratorio as $lab)
    <a href="{{URL::action('Administrador\HorarioController@listar',$lab->ID_LABORATORIO)}}">{{$lab->NOMBRE_LABORATORIO}}</a>  
            @endforeach           
        </nav>
    </div>

    <div>
    @yield('labos')
    </div>
 
        
     
@endsection