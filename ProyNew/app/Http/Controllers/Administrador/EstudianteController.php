<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Estudiante;
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
            ->orderBy('ID_ESTUDIANTE','asc')
            ->paginate(3);
            return view('administrador.estudiante.index',compact("estudiantes"),["searchText"=>$query]);
        }
    }

   
   
    public function show($id)
    {
        return view("administrador.estudiante.show",["estudiante"=>Estudiante::findOrFail($id)]);
    }
    
   
}
