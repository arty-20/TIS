<?php

namespace App\Http\Controllers\docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\GrupoLaboratorio;
use App\HoraDiaLaboratorio;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\GrupoLabFormRequest;
use DB;

class DocenteController extends Controller
{
    public function __construct(){

    }

    public function index()
    {
        $materias = DB::table('docente_materia as dm')
        ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
        ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
        ->where('d.ESTADO','=','1')
        ->where('dm.ID_DOCENTE','=','1001');
        $materias = $materias->get();

        return view('docente.index',["materias"=>$materias]);

    }

    public function store(GrupoLabFormRequest $request){

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


        return Redirect::to('docente/index');

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
            ->where('dM.ID_DOCENTE','=',"".$idDocente."")
            ->where('dM.ID_MATERIA','=',"".$idMateria."")
            ->orderBy('d.NOMBRE_DIA');
            $grupos = $grupos->get();

            $materia= DB::table('materia as m')
            ->where('m.ID_MATERIA','=',"".$idMateria."")
            ->first();
            return view('docente.grupoMateria.grupos',["grupos"=>$grupos,"materia"=>$materia]);
    }

    public function crearGrupo(){
        $auxiliares = DB::table('auxiliar')->where('ESTADO','=','1')->get();
        $materias = DB::table('docente_materia as dm')
            ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
            ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
            ->where('dm.ID_DOCENTE','=','1001');
        $materias = $materias->get();
        $dias =DB::table('dia')->get();
        $horas = DB::table('hora_clase')->get();
        $laboratorios = DB::table('laboratorio')->get();
        $horarios = DB::table('hora_dia_laboratorio')
                    ->where('DISPONIBLE','=','1')
                    ->get();

        return view('docente.grupoLaboratorio.create',["auxiliares"=>$auxiliares,"materias"=>$materias,"horas"=>$horas,"dias"=>$dias,"labs"=>$laboratorios,"horarios"=>$horarios]);

    }

     public function listarEstudiantes($id){
       $estudiantes=DB::table('inscripcion as estLab')
                    ->join('estudiante as e','estLab.ID_ESTUDIANTE','=','e.ID_ESTUDIANTE')
                    ->select('estLab.ID_GRUPOLAB','estLab.ID_ESTUDIANTE','e.CODIGO_SIS','e.NOMBRE_ESTUDIANTE','e.APELLIDO_ESTUDIANTE',DB::raw('CONCAT(e.NOMBRE_ESTUDIANTE," ",e.APELLIDO_ESTUDIANTE) as ESTUDIANTE'))
                    ->where('estLab.ID_GRUPOLAB','=',$id)
                    ->get();
            return view('docente.grupoLaboratorio.listaEstudiantes',["estudiantes"=>$estudiantes]);
    }


}
