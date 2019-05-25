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
    <a href="{{URL::action('HorarioController@listar',$lab->ID_LABORATORIO)}}">{{$lab->NOMBRE_LABORATORIO}}</a>  
            @endforeach           
        </nav>
    </div>

    
    
 
        
     <!-- <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Día</th>
                <th>Hora</th>
                <th>Acciones</th>
            </thead>
            @foreach ($horario as $hor)
            <tr>
                <td>{{$hor->NOMBRE_DIA}}</td>
                <td>{{$hor->HORA_INICIO.'-'.$hor->HORA_FIN}}</td>
                <td><a href="{{URL::action('HorarioController@ocupado',$hor->ID_HORA_DIA_LABORATORIO)}}"><button>
                @if(($hor->DISPONIBLE)==1)
                Ocupar
                @elseif(($hor->DISPONIBLE)==0)
                Desocupar
                @endif
                </button></a>
                    </td>
            </tr>   
            @endforeach        
            </table>
        </div>
        {{$horario->render()}}
    </div>  -->

@endsection