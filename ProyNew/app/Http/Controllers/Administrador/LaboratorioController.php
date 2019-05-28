<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Laboratorio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LaboratorioFormRequest;
use DB;

class LaboratorioController extends Controller
{
    public function __construct(){
    }


    public function show($id){
        return view("administrador.horario.show",["laboratio"=>Laboratorio::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("administrador.horarios.edit",["laboratorio"=>Laboratorio::findOrFail($id)]);
    }
}
