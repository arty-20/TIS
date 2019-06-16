<?php

namespace App\Http\Controllers\estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Inscripcion;
use DB;
use App\Http\Requests\InscripcionFormRequest;

use Illuminate\Support\Facades\Redirect;

use Session;


class InscripcionController extends Controller{
    public function __construct(){
    }

    public function index(){
        $id = Session::get('id');
        $gruposInscrito=DB::table('inscripcion as ins')
        ->join('grupo_laboratorio as gc','gc.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('hora_dia_laboratorio as hdl','gc.ID_HORARIO_LABORATORIO','=','hdl.ID_HORA_DIA_LABORATORIO')
        ->join('docente_materia as dm','dm.ID_DOCENTE_MATERIA','=','gc.ID_DOC_MAT')
        ->join('docente as doc','doc.ID_DOCENTE','=','dm.ID_DOCENTE')
        ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
        ->join('laboratorio as lab','hdl.ID_LABORATORIO','=','lab.ID_LABORATORIO')
        ->join('dia as d','d.ID_DIA','=','hdl.ID_DIA')
        ->join('hora_clase as hc','hc.ID_HORA','=','hdl.ID_HORA')
        ->where('ESTADO_GC','=','1')
        ->where('ID_ESTUDIANTE','=', $id);
        // ->where('ID_ESTUDIANTE','=', '100004');
        $gruposInscrito = $gruposInscrito->get();
        return view('estudiante.inscripcion.index',["gruposInscrito"=>$gruposInscrito]);
    }
    public function create(){
        return view("estudiante.inscripcion.index");
    }
    public function store(InscripcionFormRequest $request ){
        $id = Session::get('id');
        $bandera = false;
        $inscripcion = new Inscripcion;
        $inscripcion->ID_ESTUDIANTE = "$id";
        // $inscripcion->ID_ESTUDIANTE = '100004';
        $idgrupo=$request->get('ID_GRUPOLAB');
        $inscripcion->ID_GRUPOLAB =$idgrupo;

        $iddoc = $request->get('ID_DOC_MAT');
        
        $grupoLab = DB::table('grupo_laboratorio')
        ->where('ID_GRUPOLAB','=',"$idgrupo");
        $grupoLab = $grupoLab->get()->first();
        $cant = $grupoLab->CANTIDAD_ESTUDIANTES;

        $insc = DB::table('inscripcion')
        ->where('ID_GRUPOLAB','=',"$idgrupo");
        $insc = $insc->get(); 

        if(count($insc)<$cant){
            $insc1 = DB::table('inscripcion')
            ->where('ID_ESTUDIANTE','=', $id)
            // ->where('ID_ESTUDIANTE','=','100004')
            ->where('ID_GRUPOLAB','=',$idgrupo);
            $insc1 = $insc1->get()->first();
            if($insc1 == null){
                $inscripcion->save();
            }
            return Redirect::to('estudiante/inscripcion');
        }else{
            $men = "El grupo esta lleno.";
            return view('estudiante.inscripcion.grupos',["grupoLleno"=>$men,"grupos"=>null,"id"=>null]);
        }
    }
    public function listarMaterias(){
        $materias=DB::table('materia')
        ->where('ESTADO','=','1');
        $materias = $materias->get();
        return view('estudiante.inscripcion.listarMaterias',["materias"=>$materias]);
    }
    public function listarDocentesDeLaMateria( $idMateria ){
        $docentes=DB::table('docente_materia as dm')
        ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
        ->where('d.ESTADO','=','1')
        ->where('dm.ID_MATERIA','=',"".$idMateria."");
        $docentes = $docentes->get();
        return view('estudiante.inscripcion.listarDocentes',["docentes"=>$docentes,"id"=>$idMateria]);
    }
    public function buscarGrupos($idMateria, $idDocente){
	$id = Session::get('id');
        $grupos=DB::table('grupo_laboratorio as g')
        ->join('docente_materia as dm', 'g.ID_DOC_MAT','=','dm.ID_DOCENTE_MATERIA')
        ->join('hora_dia_laboratorio as hdl','g.ID_HORARIO_LABORATORIO','=','hdl.ID_HORA_DIA_LABORATORIO')
        ->join('laboratorio as lab','hdl.ID_LABORATORIO','=','lab.ID_LABORATORIO')
        ->join('dia as d','d.ID_DIA','=','hdl.ID_DIA')
        ->join('hora_clase as hc','hc.ID_HORA','=','hdl.ID_HORA')
        ->join('docente as doc', 'doc.ID_DOCENTE','=','dm.ID_DOCENTE')
        ->join('materia as mat', 'mat.ID_MATERIA','=','dm.ID_MATERIA')
        ->where('dm.ID_DOCENTE','=',"".$idDocente."")
        ->where('dm.ID_MATERIA','=',"".$idMateria."");
        $grupos = $grupos->get();
        $inscrito = DB::table('inscripcion')
        ->where('ID_ESTUDIANTE','=',"$id");
        // ->where('ID_ESTUDIANTE','=','100004');
        $inscrito=$inscrito->get();
        $ban = false;
        foreach($grupos as $g){ 
            foreach($inscrito as $i){
                if((($g->ID_GRUPOLAB) == ($i->ID_GRUPOLAB))){
                    $ban = true;
                }
            }
        }
        $grupos1=DB::table('grupo_laboratorio as g')
        ->join('docente_materia as dm', 'g.ID_DOC_MAT','=','dm.ID_DOCENTE_MATERIA')
        ->join('hora_dia_laboratorio as hdl','g.ID_HORARIO_LABORATORIO','=','hdl.ID_HORA_DIA_LABORATORIO')
        ->join('laboratorio as lab','hdl.ID_LABORATORIO','=','lab.ID_LABORATORIO')
        ->join('dia as d','d.ID_DIA','=','hdl.ID_DIA')
        ->join('hora_clase as hc','hc.ID_HORA','=','hdl.ID_HORA')
        ->join('docente as doc', 'doc.ID_DOCENTE','=','dm.ID_DOCENTE')
        ->join('materia as mat', 'mat.ID_MATERIA','=','dm.ID_MATERIA')
        ->where('dm.ID_DOCENTE','=',"".$idDocente."")
        ->where('dm.ID_MATERIA','=',"".$idMateria."");
        $grupos1 = $grupos1->get()->first();
        if($ban == false){
            return view('estudiante.inscripcion.grupos',["grupos"=>$grupos,"id"=>$grupos1->ID_DOC_MAT]);
        }else{
            return view('estudiante.inscripcion.grupos',["grupos"=>null,"id"=>null,"grupoLleno"=>null]);
        }
    }
}
