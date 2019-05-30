<?php

namespace App\Http\Controllers\docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Modelos\GrupoLaboratorio;
use App\Modelos\HoraDiaLaboratorio;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\GrupoLabFormRequest;
use DB;
use Session;

class DocenteController extends Controller
{
    public function __construct(){

    }

    public function index()
    {
     $id = '1002';
        $materias = DB::table('docente_materia as dm')
           ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
           ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
           ->where('d.ESTADO','=','1')
           ->where('dm.ID_DOCENTE','=',$id);
           $materias = $materias->get();

       return view('docente.docente',["materias"=>$materias,"idD"=>$id]);

    }




}
