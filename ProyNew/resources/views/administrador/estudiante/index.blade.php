@extends ('layouts.admin')
@section ('contenido')
    <div>
        <div>
            <h3>Listado de Estudiantes</h3>
        </div>
    </div>

    <div>
        @include('administrador.estudiante.search')
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                </thead>
                @foreach ($estudiantes as $doc)
                <tr>
                    <td>{{ $doc->NOMBRE_ESTUDIANTE}}</td>
                    <td>{{ $doc->APELLIDO_ESTUDIANTE}}</td>
                    <td>{{ $doc->EMAIL}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        {{$estudiantes->render()}}
    </div>
@endsection