{!! Form::open(array('url'=>'administrador/auxiliar', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
<div class="form-group">
    <div class="input_group">
        <input type="text" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
        <span>
            <button type="submit">Buscar</button>
        </span>
    </div>
</div>

{{ Form::close()}} 