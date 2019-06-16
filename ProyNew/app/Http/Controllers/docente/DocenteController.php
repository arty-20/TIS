<?php

namespace App\Http\Controllers\docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Modelos\GrupoLaboratorio;
use App\Modelos\HoraDiaLaboratorio;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\GrupoLabFormRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;
use DB;

class DocenteController extends Controller
{
    public function __construct(){
       
    }

    public function index()
    {
        $id = Session::get('id');
        $materias = DB::table('docente_materia as dm')
           ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
           ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
           ->where('d.ESTADO','=','1')
           ->where('dm.ID_DOCENTE','=',$id);
           $materias = $materias->get();

       return view('docente.docente',["materias"=>$materias,"id"=>$id]);
       
    }
    public function store(GrupoLabFormRequest $request){
        $id = Session::get('id');
        $idDocMat = $request->get('ID_DOC_MAT');
        

        $docenteMateria = DB::table('docente_materia as dm')
                        ->where('dm.ID_DOCENTE_MATERIA','=',$idDocMat)
                        ->first();
        $idMateria = $docenteMateria->ID_MATERIA;

        $grupos = DB::table('grupo_laboratorio as gLab')
                 ->where('gLab.ID_DOC_MAT','=',"".$idDocMat."")
                 ->where('gLab.ESTADO_GC','=','1')
                 ->get();

        $horario = DB::table ('hora_dia_laboratorio as hLab')
                    ->select('hLab.ID_HORA_DIA_LABORATORIO')
                    ->where('hLab.ID_LABORATORIO','=',$request->get('ID_LABORATORIO'))
                    ->where('hLab.ID_DIA','=',$request->get('ID_DIA'))
                    ->where('hLab.ID_HORA','=',$request->get('ID_HORA'))
                    ->first();
        $hora = $horario->ID_HORA_DIA_LABORATORIO;
        


        $grupoLaboratorio = new GrupoLaboratorio;
        $grupoLaboratorio->ID_DOC_MAT=$request->get('ID_DOC_MAT');
        $grupoLaboratorio->ID_AUX=$request->get('ID_AUXILIAR');
        $grupoLaboratorio->ESTADO_GC='1';
        $grupoLaboratorio->ID_HORARIO_LABORATORIO=$hora;
        $grupoLaboratorio->CANTIDAD_ESTUDIANTES=$request->get('CANTIDAD');

        $fecha = Carbon::now();
        $fecha = $fecha->format('Y-m-d');
        $idGestion = DB::table('gestion');
        $idGestion = $idGestion->get();
        foreach($idGestion as $gestion){
            $ini = $gestion->INICIO_GESTION;
            $fin = $gestion->FIN_GESTION;
            $idGestion1 = DB::table('gestion')
            ->where('INICIO_GESTION','<=',$fecha)
            ->where('FIN_GESTION','>=',$fecha);
            $idGestion1 = $idGestion1->get()->first();
            if($idGestion1 != null){
                $grupoLaboratorio->ID_GESTION = $idGestion1->ID_GESTION;
            }
        }

        $grupoLaboratorio->save();  
        
        echo "<script type='text/javascript' >window.location.replace('docente/grupos/' + $idMateria);</script>";
    }
    public function agregarMateria($idDocente){
       
            $materias = DB::table('materia as m')
                   ->whereNotIn('m.ID_MATERIA',function($q){
                    $id = Session::get('id');
                       $q->select('m.ID_MATERIA')
                         ->from('docente_materia as m')
                         ->where('m.ID_DOCENTE','=',$id);
                   })->get();

            return view ('docente.grupoMateria.agregarMateria',["materias"=>$materias]);
        
   }
   
   public function listarGrupos($idM){

    $id = Session::get('id');
    
        $grupos=DB::table('grupo_laboratorio as gLab')
        ->join('docente_materia as dM', 'gLab.ID_DOC_MAT','=','dM.ID_DOCENTE_MATERIA')
        ->join('docente as doc', 'doc.ID_DOCENTE','=','dM.ID_DOCENTE')
        ->join('materia as mat', 'mat.ID_MATERIA','=','dM.ID_MATERIA')
        ->join('hora_dia_laboratorio as hdLab', 'hdLab.ID_HORA_DIA_LABORATORIO','=','gLab.ID_HORARIO_LABORATORIO')
        ->join('laboratorio as lab','lab.ID_LABORATORIO','=','hdLab.ID_LABORATORIO')
        ->join('dia as d','d.ID_DIA','=','hdLab.ID_DIA')
        ->join('hora_clase as h','h.ID_HORA','=','hdLab.ID_HORA')
        ->select('gLab.ID_GRUPOLAB','gLab.ESTADO_GC', 'd.NOMBRE_DIA', 'h.HORA_INICIO', 'h.HORA_FIN')
        ->where('dM.ID_DOCENTE','=',$id)
        ->where('dM.ID_MATERIA','=',$idM)
        ->orderBy('d.ID_DIA');
        $grupos = $grupos->get();

        $materia= DB::table('materia as m')
        ->where('m.ID_MATERIA','=',"".$idM."")
        ->first();
    
         return view('docente.grupoMateria.grupos',["grupos"=>$grupos,"materia"=>$materia]);
   }
   public function crearGrupo($idMateria){
    $id = Session::get('id');

    $auxiliares = DB::table('auxiliar')->where('ESTADO','=','1')->get();
    
    $materia = DB::table('docente_materia as dm')
                ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
                ->where ('dm.ID_DOCENTE','=',$id)
                ->where('dm.ID_MATERIA','=',$idMateria);
    $materia = $materia->first();
    
    $laboratorios = DB::table('laboratorio')->get();

    
    return view('docente.grupoLaboratorio.agregarGrupo',["auxiliares"=>$auxiliares,"materia"=>$materia,"labs"=>$laboratorios]);
    
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
       
       return response()->json($p);
    }

    public function findAuxiliar(Request $request){
    
        $data =DB::select('SELECT aux.ID_AUXILIAR,aux.NOMBRE_AUXILIAR,aux.APELLIDO_AUXILIAR
                            FROM auxiliar as aux 
                            WHERE aux.ID_AUXILIAR NOT IN (SELECT a.ID_AUXILIAR FROM auxiliar as a 
                                                        JOIN grupo_laboratorio as gLab 
                                                        JOIN hora_dia_laboratorio as hLab 
                                                        WHERE a.ID_AUXILIAR=gLab.ID_AUX 
                                                        AND gLab.ID_HORARIO_LABORATORIO = hLab.ID_HORA_DIA_LABORATORIO 
                                                        AND hLab.ID_DIA=:idD
                                                        AND hLab.ID_HORA=:idH)',["idD"=>$request->idDia,"idH"=>$request->idHora]);

       
        return response()->json($data);
    }
    



}
