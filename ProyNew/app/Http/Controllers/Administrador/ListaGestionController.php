<?php

namespace App\Http\Controllers\Administrador;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Gestion;
use App\Modelos\GrupoLaboratorio;
use App\Modelos\DocenteMateria;
use App\Modelos\Auxiliar;
use App\Modelos\Docente;
use App\Modelos\Materia;
use App\Modelos\Horario;
use App\Modelos\Hora;
use App\Modelos\Dia;
use App\Modelos\Laboratorio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GestionFormRequest;
use DB;

class ListaGestionController extends Controller
{
    // public function listGestion($id){
    //     $lista=DB::table('grupo_laboratorio as gl')
    //     ->join('gestion as g', 'gl.ID_GESTION','=','g.ID_GESTION')
    //     ->select('g.ID_GESTION','gl.ID_GRUPOLAB','g.NOMBRE_GESTION')
    //     ->where('ID_GESTION','=','$id');
    //     return view('administrador.gestion.lista.show',["lista"=>$lista]);
    // }

    public function index(Request $request){

        $gestion=DB::table('gestion as g')
        ->join('grupo_laboratorio as gl', 'g.ID_GESTION','=','gl.ID_GESTION')
        ->join('docente_materia as dm', 'gl.ID_DOC_MAT','=','dm.ID_DOCENTE_MATERIA')
        ->join('auxiliar as aux', 'gl.ID_AUX','=','aux.ID_AUXILIAR')
        ->join('docente as doc', 'dm.ID_DOCENTE','=','doc.ID_DOCENTE')
        ->join('materia as mat', 'dm.ID_MATERIA','=','mat.ID_MATERIA')
        ->join('hora_dia_laboratorio as hdl','gl.ID_HORARIO_LABORATORIO','=','hdl.ID_HORA_DIA_LABORATORIO')
        ->join('hora_clase as h','hdl.ID_HORA','=','h.ID_HORA')
        ->join('dia as d','d.ID_DIA','=','hdl.ID_DIA')
        ->join('laboratorio as lab', 'lab.ID_LABORATORIO', '=','hdl.ID_LABORATORIO')
        ->select('g.ID_GESTION','gl.ID_GRUPOLAB','g.NOMBRE_GESTION','d.NOMBRE_DIA','lab.NOMBRE_LABORATORIO','h.HORA_INICIO',
                'h.HORA_FIN','doc.NOMBRE_DOCENTE','doc.APELLIDO_DOCENTE','aux.NOMBRE_AUXILIAR',
                'aux.APELLIDO_AUXILIAR','mat.NOMBRE_MATERIA','dm.ID_DOC_MAT','hdl.ID_HORA_DIA_LABORATORIO')
        ->where('g.ID_GESTION','=','$id');
        return view('administrador.gestion.lista.index',["gestion"=>$gestion]);
    }

    public function show($id){

        $lista=DB::table('gestion as g')
        ->join('grupo_laboratorio as gl', 'g.ID_GESTION','=','gl.ID_GESTION')
        ->join('docente_materia as dm', 'gl.ID_DOC_MAT','=','dm.ID_DOCENTE_MATERIA')
        ->join('auxiliar as aux', 'gl.ID_AUX','=','aux.ID_AUXILIAR')
        ->join('docente as doc', 'dm.ID_DOCENTE','=','doc.ID_DOCENTE')
        ->join('materia as mat', 'dm.ID_MATERIA','=','mat.ID_MATERIA')
        ->join('hora_dia_laboratorio as hdl','gl.ID_HORARIO_LABORATORIO','=','hdl.ID_HORA_DIA_LABORATORIO')
        ->join('hora_clase as h','hdl.ID_HORA','=','h.ID_HORA')
        ->join('dia as d','d.ID_DIA','=','hdl.ID_DIA')
        ->join('laboratorio as lab', 'lab.ID_LABORATORIO', '=','hdl.ID_LABORATORIO')
        ->select('g.ID_GESTION','gl.ID_GRUPOLAB','g.NOMBRE_GESTION','d.NOMBRE_DIA','lab.NOMBRE_LABORATORIO','h.HORA_INICIO',
                'h.HORA_FIN','doc.NOMBRE_DOCENTE','doc.APELLIDO_DOCENTE','aux.NOMBRE_AUXILIAR',
                'aux.APELLIDO_AUXILIAR','mat.NOMBRE_MATERIA','dm.ID_DOC_MAT','hdl.ID_HORA_DIA_LABORATORIO')
        ->where('g.ID_GESTION','=',$id);
        return view('administrador.gestion.lista.show',["gestion"=>Gestion::findOrFail($id)]);
    }
}
