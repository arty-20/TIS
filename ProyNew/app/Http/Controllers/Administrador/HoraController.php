<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Hora;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HoraFormRequest;
use DB;

class HoraController extends Controller
{
    public function __construct(){
    }

    

    public function show($id){
        return view("administrador.horario.show",["hora_clase"=>Hora::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("administrador.horario.edit",["hora_clase"=>Hora::findOrFail($id)]);
    }
}
