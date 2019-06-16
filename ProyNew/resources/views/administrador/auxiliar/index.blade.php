@extends ('layouts.administrador')
@section ('contenidoadmin')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="float:left;">
        <a style="float:right; text-decoration:none;" href="/administrador/auxiliar/create"><button style="border:0px; padding:0px;" width="50px"><img  src="{{ asset('/img/masblancofondonegro.jpg') }}" alt="Nuevo" width="75"></button></a>        
        <h3 >Listado de auxiliares</h3>
        @include('administrador.auxiliar.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </thead>
                @foreach ($auxiliares as $doc)
                <tr>
                    <td>{{ $doc->NOMBRE_AUXILIAR}}</td>
                    <td>{{ $doc->APELLIDO_AUXILIAR}}</td>
                    <td>{{ $doc->EMAIL}}</td>
                    <td> <!--<a href="{{URL::action('Administrador\AuxiliarController@edit', $doc->ID_AUXILIAR)}}"><button class="btn btn-info">Editar</button></a>-->
                    <a href="{{URL::action('Administrador\AuxiliarController@destroy', $doc->ID_AUXILIAR)}}"><button class="btn btn-danger">Eliminar</button></a>   
                </td>
                </tr>
                @include('administrador.auxiliar.modal')
                @endforeach
              </table>
            </div>
            {!! $auxiliares->links('administrador.pagination') !!}
        </div>
    </div>
@endsection