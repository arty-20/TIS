<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Estudiante;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EstudianteFormRequest;
use DB;

class EstudianteController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request){
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $estudiantes=DB::table('estudiante')->where('NOMBRE_ESTUDIANTE','LIKE','%'.$query.'%')
            ->where ('ESTADO', '=', '1') 
            ->orderBy('ID_ESTUDIANTE','desc')
            ->paginate(3);
            return view('administrador.estudiante.index',["estudiantees"=>$estudiantes,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("administrador.estudiante.create");
    }
    public function store (AuxiFormRequest $request)
    {
        $auxiliar=new Estudiante;
        $auxiliar->CONTRASENIA=$request->get('CONTRASENIA');
        $auxiliar->EMAIL=$request->get('EMAIL');
        $auxiliar->NOMBRE_AUXILIAR=$request->get('NOMBRE_ESTUDIANTE');
        $auxiliar->APELLIDO_AUXILIAR=$request->get('APELLIDO_ESTUDIANTE');
        $auxiliar->CODIGO_SIS=$request->get('CODIGO_SIS');
        $auxiliar->ESTADO='1';
        $auxiliar->save();
        return Redirect::to('administrador/estudiante');
    }
    public function show($id)
    {
        return view("administrador.estudiante.show",["estudiante"=>Estudiante::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.estudiante.edit",["estudiante"=>Estudiante::findOrFail($id)]);
    }
    public function update(AuxiFormRequest $request,$id)
    {
        $auxiliar=Estudiante::findOrFail($id);
        $auxiliar->CONTRASENIA=$request->get('CONTRASENIA');
        $auxiliar->EMAIL=$request->get('EMAIL');
        $auxiliar->NOMBRE_AUXILIAR=$request->get('NOMBRE_ESTUDIANTE');
        $auxiliar->APELLIDO_AUXILIAR=$request->get('APELLIDO_ESTUDIANTE');
        $auxiliar->CODIGO_SIS=$request->get('CODIGO_SIS');
        $docente->update();
        return Redirect::to('administrador/estudiante');
    }
    public function destroy($id)
    {
        $auxiliar=Estudiante::findOrFail($id);
        $auxiliar->ESTADO='0';
        $auxiliar->update();
        return Redirect::to('administrador/estudiante');
    }
}
