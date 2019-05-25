{!! Form::open(array('url'=>'administrador/docente', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
<div>
    <div>
        <input type="text" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
        <span>
            <button type="submit">Buscar</button>
        </span>
    </div>
</div>

{{ Form::close()}} 