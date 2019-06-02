@extends ('layouts.admin')
@section ('contenidoadmin')
<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="float:left;">
        <a style="float:right; text-decoration:none;" href="/administrador/gestion/create"><button style="border:0px; padding:0px;" width="50px"><img  src="{{ asset('/img/masblancofondonegro.jpg') }}" alt="Nuevo" width="75"></button></a>        
        <h3 >Listado de gestiones</h3>
        @include('administrador.gestion.search')
        </div>
    </div>

    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Periodo</th>
                    <th>Acciones</th>
                </thead>
                @foreach ($gestiones as $doc)
                <tr>
                    <td>{{ $doc->NOMBRE_GESTION}}</td>
                    <td>{{$doc->INICIO_GESTION.' -> '.$doc->FIN_GESTION}}</td>
                    <td>
                    <a href="{{URL::action('Administrador\GestionController@listGestion',$doc->ID_GESTION)}}"><button class="btn btn-info">Ver Gestión</button></a>
                    <a href="{{URL::action('Administrador\GestionController@edit',$doc->ID_GESTION)}}"><button class="btn btn-info">Editar</button></a>
                    <a href="{{URL::action('Administrador\GestionController@destroy', $doc->ID_GESTION)}}"><button class="btn btn-danger">Eliminar</button></a></td>
                </tr>
                @include('administrador.gestion.modal')
                @endforeach
            </table>
        </div>
        {{$gestiones->render()}}
    </div>
    </div>
@endsection