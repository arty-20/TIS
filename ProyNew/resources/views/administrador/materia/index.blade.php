@extends ('layouts.admin')
@section ('contenido')
<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="float:left;">
        <a style="float:right; text-decoration:none;" href="/administrador/materia/create"><button style="border:0px; padding:0px;" width="50px"><img  src="{{ asset('/img/masblancofondonegro.jpg') }}" alt="Nuevo" width="75"></button></a>        
        <h3 >Listado de materias</h3>
        @include('administrador.materia.search')
        </div>
    </div>

    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                    <a href="{{URL::action('Administrador\MateriaController@destroy', $doc->ID_MATERIA)}}"><button class="btn btn-danger">Eliminar</button></a></td>
                </tr>
                @include('administrador.materia.modal')
                @endforeach
            </table>
        </div>
        {{$materias->render()}}
        </div>
    </div>
@endsection