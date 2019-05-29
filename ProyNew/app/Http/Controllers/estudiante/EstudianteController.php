<?php

namespace App\Http\Controllers\estudiante;

use Illuminate\Http\Request;
use App\Modelos\Estudiante;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EstudianteFormRequest;
use DB;
use App\Http\Controllers\Controller;

class EstudianteController extends Controller{
    public function __contruct(){

    }

    public function index(){
        return view("estudiante.registro.index");
    }
    public function create(){
        return view("estudiante.registro.create");
    }
    public function store(EstudianteFormRequest $request ){
        $estudiante = new Estudiante;
        $estudiante->NOMBRE_ESTUDIANTE = $request->get('NOMBRE_ESTUDIANTE');
        $estudiante->APELLIDO_ESTUDIANTE = $request->get('APELLIDO_ESTUDIANTE');
        $estudiante->CODIGO_SIS = $request->get('CODIGO_SIS');
        $estudiante->EMAIL = $request->get('EMAIL');
        $estudiante->CONTRASENIA = $request->get('CONTRASENIA');
        $estudiante->ESTADO ='1';
        $estudiante->save();
        return Redirect::to('estudiante.registro');
    }
}
