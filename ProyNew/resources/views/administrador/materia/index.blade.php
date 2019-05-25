@extends ('layouts.admin')
@section ('contenido')
    <div>
        <div>
            <h3>Lista de Materias</h3>
            <a href="materia/create"><button>Crear nueva Materia</button></a>
                        
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                @foreach ($materias as $doc)
                <tr>
                    <td>{{ $doc->ID_MATERIA}}</td>
                    <td>{{ $doc->NOMBRE_MATERIA}}</td>
                    <td><a href="{{URL::action('Administrador\MateriaController@edit', $doc->ID_MATERIA)}}"><button class="btn btn-info">Editar</button></a>
                    <a href="" data-target="#modal-delete-{{$doc->ID_MATERIA}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
                </tr>
                @include('administrador.materia.modal')
                @endforeach
            </table>
        </div>
        {{$materias->render()}}
    </div>
@endsection