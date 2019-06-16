<?php

namespace App\Http\Controllers\docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Auxiliar;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AuxiliarFormRequest;
use DB;

class RegistroAuxController extends Controller
{
    public function crearAuxiliar($idM)
    {
        return view("docente.auxiliar.create",["idM"=>$idM]);
    }
    public function store (Request $request)
    {
        $auxiliar=new Auxiliar;
        $auxiliar->CONTRASENIA=bcrypt($request->get('CONTRASENIA'));
        $data['email']=$auxiliar->EMAIL=$request->get('EMAIL');
        $data['nombre']=$auxiliar->NOMBRE_AUXILIAR=$request->get('NOMBRE_AUXILIAR');
        $data['apellido']=$auxiliar->APELLIDO_AUXILIAR=$request->get('APELLIDO_AUXILIAR');
        $auxiliar->CODIGO_SIS=$request->get('CODIGO_SIS');
        $auxiliar->ESTADO='1';
        $auxiliar->save();
        echo "<script>history.go(-2);</script>"; 
    }
}
