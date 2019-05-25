<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sesion;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SesionFormRequest;
use DB;

class SesionController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request){
    	if ($request)
        {
            $query=trim($request->get('searchText'));
            $sesiones=DB::table('sesion')->where('NRO_GRUPO','LIKE','%'.$query.'%')
            ->where ('ESTADO', '=', '1')
            ->orderBy('ID_SESION','desc')
            ->paginate(3);
            return view('administrador.sesion.index',["sesiones"=>$sesiones,"searchText"=>$query]);
        }

	}

    public function indexlabs(){
        return view("administrador.sesion.laboratorios.lab1");
    }

    public function create(){
    	return view("administrador.sesion.create");
    }

    public function show($id)
    {
        return view("administrador.sesion.show",["sesion"=>Sesion::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.sesion.edit",["docente"=>Sesion::findOrFail($id)]);
    }
    
}
