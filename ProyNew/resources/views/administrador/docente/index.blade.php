@extends ('layouts.admin')
@section ('contenido')
    <div>
        <div>
            <h3>Listado de docentes</h3>
            <a href="docente/create"><button>Crear nuevo Docente</button></a>
        </div>
    </div>

    <div>
        @include('administrador.docente.search')
    </div>

    <div class="row">
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
                    <a href="" data-target="#modal-delete-{{$doc->ID_DOCENTE}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
                </tr>
                @include('administrador.docente.modal')
                @endforeach
            </table>
        </div>
        {{$docentes->render()}}
    </div>
@endsection