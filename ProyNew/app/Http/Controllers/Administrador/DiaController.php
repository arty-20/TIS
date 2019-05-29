<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Dia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DiaFormRequest;
use DB;

class DiaController extends Controller
{
    public function __construct(){
    }


    public function show($id){
        return view("administrador.horario.show",["dia"=>Dia::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("administrador.horario.edit",["dia"=>Dia::findOrFail($id)]);
    }
}
