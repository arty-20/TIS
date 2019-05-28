<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Docente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DocenteFormRequest;
use DB;


class DocenteController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $docentes=DB::table('docente')->where('NOMBRE_DOCENTE','LIKE','%'.$query.'%')
            ->where ('ESTADO', '=', '1')
            ->orderBy('ID_DOCENTE','desc')
            ->paginate(3);
            return view('administrador.docente.index',["docentes"=>$docentes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administrador.docente.create");
    }
    public function store (DocenteFormRequest $request)
    {
        $docente=new Docente;
        $docente->CONTRASENIA=$request->get('CONTRASENIA');
        $docente->EMAIL=$request->get('EMAIL');
        $docente->NOMBRE_DOCENTE=$request->get('NOMBRE_DOCENTE');
        $docente->APELLIDO_DOCENTE=$request->get('APELLIDO_DOCENTE');
        $docente->TELEFONO=$request->get('TELEFONO');
        $docente->CODIGO_DOCENTE=$request->get('CODIGO_DOCENTE');
        $docente->ESTADO='1';
        $docente->save();
        return Redirect::to('administrador/docente');
    }
    public function show($id)
    {
        return view("administrador.docente.show",["docente"=>Docente::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.docente.edit",["docente"=>Docente::findOrFail($id)]);
    }
    public function update(DocenteFormRequest $request,$id)
    {
        $docente=Docente::findOrFail($id);
        $docente->CONTRASENIA=$request->get('CONTRASENIA');
        $docente->EMAIL=$request->get('EMAIL');
        $docente->NOMBRE_DOCENTE=$request->get('NOMBRE_DOCENTE');
        $docente->APELLIDO_DOCENTE=$request->get('APELLIDO_DOCENTE');
        $docente->TELEFONO=$request->get('TELEFONO');
        $docente->CODIGO_DOCENTE=$request->get('CODIGO_DOCENTE');
        $docente->update();
        return Redirect::to('administrador/docente');
    }
    public function destroy($id)
    {
        $docente=Docente::findOrFail($id);
        $docente->ESTADO='0';
        $docente->update();
        return Redirect::to('administrador/docente');
    }
}

