@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="float:left;">
        <a style="float:right; text-decoration:none;" href="/administrador/docente/create"><button style="border:0px; padding:0px;" width="50px"><img  src="{{ asset('/img/masblancofondonegro.jpg') }}" alt="Nuevo" width="75"></button></a>        
        <h3 >Listado de Docentes</h3>
        @include('administrador.docente.search')
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
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </thead>
                @foreach ($docentes as $doc)
                <tr>
                    <td>{{ $doc->NOMBRE_DOCENTE}}</td>
                    <td>{{ $doc->APELLIDO_DOCENTE}}</td>
                    <td>{{ $doc->EMAIL}}</td>
                    <td>{{ $doc->TELEFONO}}</td>
                    <td><a href="{{URL::action('Administrador\DocenteController@edit', $doc->ID_DOCENTE)}}"><button class="btn btn-info">Editar</button></a>
                    <a href="{{URL::action('Administrador\DocenteController@destroy', $doc->ID_DOCENTE)}}"><button class="btn btn-danger">Eliminar</button></a></td>
                </tr>
                @include('administrador.docente.modal')
                @endforeach
            </table>
        </div>
        {{$docentes->render()}}
        </div>
    </div>
@endsection