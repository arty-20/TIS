@extends ('layouts.admin')
@section ('contenido')
<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="float:left;">
        <h3 >Listado de estudiantes</h3>
        @include('administrador.estudiante.search')
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
    </div>
@endsection