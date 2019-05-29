<?php

namespace App\Http\Controllers\docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Modelos\GrupoLaboratorio;
use App\Modelos\HoraDiaLaboratorio;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\GrupoLabFormRequest;
use DB;

class DocenteController extends Controller
{
    private $id;   
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

    public function store(GrupoLabFormRequest $request){
        
        $idDocMat = $request->get('ID_DOC_MAT');

        $docenteMateria = DB::table('docente_materia as dm')
                        ->where('dm.ID_DOCENTE_MATERIA','=',$idDocMat)
                        ->first();
           
        $idDocente = $docenteMateria->ID_DOCENTE;
        $idMateria = $docenteMateria->ID_MATERIA;

         $horarioLab = new HoraDiaLaboratorio;
          $horarioLab->ID_LABORATORIO=$request->get('ID_LABORATORIO');
          $horarioLab->ID_DIA=$request->get('ID_DIA');
          $horarioLab->ID_HORA=$request->get('ID_HORA');
          $horarioLab->DISPONIBLE='1';
          $horarioLab->ESTADO_LAB='1';
          $horarioLab->save();

        $grupoLaboratorio = new GrupoLaboratorio;
            $grupoLaboratorio->ID_DOC_MAT=$request->get('ID_DOC_MAT');
            $grupoLaboratorio->ID_AUX=$request->get('ID_AUX');
            $grupoLaboratorio->ESTADO_GC='1';
            $grupoLaboratorio->ID_HORARIO_LABORATORIO=$horarioLab->ID_HORA_DIA_LABORATORIO;
            $grupoLaboratorio->CANTIDAD_ESTUDIANTES='30';
            $grupoLaboratorio->ID_GESTION='301';
            $grupoLaboratorio->save();
        // echo $idDocente." ".$idMateria."  ".$idDocMat;    

        echo "<script type='text/javascript' >window.location.replace('docente/grupos/' + $idMateria + '/' + $idDocente);</script>";

    }

    public function agregarMateria($idDocente){
        

         $materias = DB::table('materia as m')
                    ->join('docente_materia as dm','dm.ID_MATERIA','=','m.ID_MATERIA')
                    ->whereNotIn('m.ID_MATERIA',function($q){
                        $q->select('ID_MATERIA')
                          ->from('docente_materia as m')
                          ->where('m.ID_DOCENTE','=','1002');
                    })->get();

        return view ('docente.grupoMateria.agregarMateria',["id"=>$idDocente,"materias"=>$materias]);
    }

   
    public function listarGrupos($idMateria, $idDocente){
            $grupos=DB::table('grupo_laboratorio as gLab')
            ->join('docente_materia as dM', 'gLab.ID_DOC_MAT','=','dM.ID_DOCENTE_MATERIA')
            ->join('docente as doc', 'doc.ID_DOCENTE','=','dM.ID_DOCENTE')
            ->join('materia as mat', 'mat.ID_MATERIA','=','dM.ID_MATERIA')
            ->join('hora_dia_laboratorio as hdLab', 'hdLab.ID_HORA_DIA_LABORATORIO','=','gLab.ID_HORARIO_LABORATORIO')
            ->join('laboratorio as lab','lab.ID_LABORATORIO','=','hdLab.ID_LABORATORIO')
            ->join('dia as d','d.ID_DIA','=','hdLab.ID_DIA')
            ->join('hora_clase as h','h.ID_HORA','=','hdLab.ID_HORA')
            ->select('gLab.ID_GRUPOLAB','gLab.ESTADO_GC', 'd.NOMBRE_DIA', 'h.HORA_INICIO', 'h.HORA_FIN')
            ->where('dM.ID_DOCENTE','=',$idDocente)
            ->where('dM.ID_MATERIA','=',$idMateria)
            ->orderBy('d.NOMBRE_DIA');
            $grupos = $grupos->get();

            $materia= DB::table('materia as m')
            ->where('m.ID_MATERIA','=',"".$idMateria."")
            ->first();
            return view('docente.grupoMateria.grupos',["grupos"=>$grupos,"materia"=>$materia]);
    }

    public function crearGrupo($idMateria){
        $auxiliares = DB::table('auxiliar')->where('ESTADO','=','1')->get();

        $materia = DB::table('docente_materia as dm')
                    ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
                    ->where ('dm.ID_DOCENTE','=','1002')
                    ->where('dm.ID_MATERIA','=',$idMateria);
        $materia = $materia->first();

        $laboratorios = DB::table('laboratorio')->get();
        
        return view('docente.grupoLaboratorio.agregarGrupo',["auxiliares"=>$auxiliares,"materia"=>$materia,"labs"=>$laboratorios]);

    }

    public function listarEstudiantes($id){
       $estudiantes=DB::table('inscripcion as estLab')
                    ->join('estudiante as e','estLab.ID_ESTUDIANTE','=','e.ID_ESTUDIANTE')
                    ->select('estLab.ID_GRUPOLAB','estLab.ID_ESTUDIANTE','e.CODIGO_SIS','e.NOMBRE_ESTUDIANTE','e.APELLIDO_ESTUDIANTE',DB::raw('CONCAT(e.NOMBRE_ESTUDIANTE," ",e.APELLIDO_ESTUDIANTE) as ESTUDIANTE'))
                    ->where('estLab.ID_GRUPOLAB','=',"".$id."")
                    ->get();
            return view('docente.grupoLaboratorio.listaEstudiantes',["estudiantes"=>$estudiantes]);
    }


    public function findDia(Request $request){

         $data= DB::table('hora_dia_laboratorio as hdl')
                    ->join('dia as d','d.ID_DIA','=','hdl.ID_DIA')
                    ->select('hdl.ID_DIA','d.NOMBRE_DIA')
                    ->where('hdl.ID_LABORATORIO','=',"".$request->id."")
                    ->where('hdl.DISPONIBLE','=','1')
                    ->groupBy('hdl.ID_DIA','d.NOMBRE_DIA')
                    ->get();

        return response()->json($data);
    }
    public function findHoras(Request $request){

         $p= DB::table('hora_dia_laboratorio as hdl')
                    ->join('dia as d','d.ID_DIA','=','hdl.ID_DIA')
                    ->join('hora_clase as h','h.ID_HORA','=','hdl.ID_HORA')
                    ->select('hdl.ID_HORA','h.HORA_INICIO','h.HORA_FIN')
                    ->where('hdl.ID_LABORATORIO','=',"".$request->idLab."")
                    ->where('hdl.ID_DIA','=',"".$request->idDia."")
                    ->where('hdl.DISPONIBLE','=','1')
                    ->groupBy('hdl.ID_HORA','h.HORA_INICIO','h.HORA_FIN')
                    ->get();
        /**
        SELECT hdl.ID_HORA, h.HORA_INICIO, h.HORA_FIN FROM hora_dia_laboratorio as hdl JOIN dia as d JOIN hora_clase as h WHERE hdl.ID_DIA=d.ID_DIA AND hdl.ID_HORA=h.ID_HORA AND hdl.ID_LABORATORIO = '1' AND hdl.ID_DIA = '5' AND hdl.DISPONIBLE='1' GROUP BY hdl.ID_HORA, h.HORA_INICIO, h.HORA_FIN
        **/

        return response()->json($p);
    }
    public function findAuxiliares(Request $request){

         $auxiliares= DB::table('grupo_laboratorio as gLab')
                ->join('hora_dia_laboratorio as hdLab', 'hdLab.ID_HORA_DIA_LABORATORIO','=','gLab.ID_HORARIO_LABORATORIO')
                ->where('hdl.ID_LABORATORIO','=',"".$request->id."")
                    ->where('hdl.DISPONIBLE','=','1')
                    ->groupBy('hdl.ID_DIA','d.NOMBRE_DIA')
                    ->get();

        return response()->json($auxiliares);
    }

  
}
