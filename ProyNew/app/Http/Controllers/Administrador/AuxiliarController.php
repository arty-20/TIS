<?php

namespace App\Http\Controllers\Administrador;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auxiliar;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AuxiliarFormRequest;
use DB;


class AuxiliarController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request){
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $auxiliares=DB::table('auxiliar')->where('NOMBRE_AUXILIAR','LIKE','%'.$query.'%')
            ->where ('ESTADO', '=', '0') 
            ->orderBy('ID_AUXILIAR','desc')
            ->paginate(3);
            return view('administrador.auxiliar.index',["auxiliares"=>$auxiliares,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("administrador.auxiliar.create");
    }
    public function store (AuxiliarFormRequest $request)
    {
        $auxiliar=new Auxiliar;
        $auxiliar->CONTRASENIA=$request->get('CONTRASENIA');
        $auxiliar->EMAIL=$request->get('EMAIL');
        $auxiliar->NOMBRE_AUXILIAR=$request->get('NOMBRE_AUXILIAR');
        $auxiliar->APELLIDO_AUXILIAR=$request->get('APELLIDO_AUXILIAR');
        $auxiliar->CODIGO_SIS=$request->get('CODIGO_SIS');
        $auxiliar->ESTADO='1';
        $auxiliar->save();
        return Redirect::to('administrador/auxiliar');
    }
    public function show($id)
    {
        return view("administrador.auxiliar.show",["auxiliar"=>Auxiliar::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.auxiliar.edit",["auxiliar"=>Auxiliar::findOrFail($id)]);
    }
    public function update(AuxiFormRequest $request,$id)
    {
        $auxiliar=Auxiliar::findOrFail($id);
        $auxiliar->CONTRASENIA=$request->get('CONTRASENIA');
        $auxiliar->EMAIL=$request->get('EMAIL');
        $auxiliar->NOMBRE_AUXILIAR=$request->get('NOMBRE_AUXILIAR');
        $auxiliar->APELLIDO_AUXILIAR=$request->get('APELLIDO_AUXILIAR');
        //$auxiliar->CODIGO_SIS=$request->get('CODIGO_SIS');
        $docente->update();
        return Redirect::to('administrador/auxiliar');
    }
    public function destroy($id)
    {
        $auxiliar=Auxiliar::findOrFail($id);
        $auxiliar->ESTADO='0';
        $auxiliar->update();
        return Redirect::to('administrador/auxiliar');
    }
}
