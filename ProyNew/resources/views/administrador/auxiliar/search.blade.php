{!! Form::open(array('url'=>'administrador/auxiliar', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
<div class="form-group" style="float:left;">
    <div class="input-group" >
        <input type="text" style="margin:0px;" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
        <span style="margin:0px; border:0;" >
            <button  style="border:0; background:#FFF" type="submit"> <img src="{{asset('/img/searchblack.png')}}" alt="Buscar" width="40"></button>
        </span>
    </div>
</div>

{{ Form::close()}}
