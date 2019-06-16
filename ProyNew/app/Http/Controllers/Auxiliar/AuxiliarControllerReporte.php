<?php

namespace App\Http\Controllers\Auxiliar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Estudiantes;
use App\Modelos\ComentarioPortafolio;
use App\Auxiliar;
use App\Modelos\Portafolio;
use App\Modelos\PracticaGrupo;
use App\Modelos\Inscripcion;
use App\Http\Requests\AuxiliarFormRequest;
use App\Http\Requests\ComentarioFormRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

use DB;
use Session;


class AuxiliarControllerReporte extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
      $id = Session::get('id');
        if ($request)
        {

          $grupos=DB::table('grupo_laboratorio as gLab')
                ->join('auxiliar as aux', 'gLab.ID_AUX', '=', 'aux.ID_AUXILIAR')
                ->join('docente_materia as dM', 'gLab.ID_DOC_MAT','=','dM.ID_DOCENTE_MATERIA')
                ->join('docente as doc', 'doc.ID_DOCENTE','=','dM.ID_DOCENTE')
                ->join('materia as mat', 'mat.ID_MATERIA','=','dM.ID_MATERIA')
                ->join('hora_dia_laboratorio as hdLab', 'hdLab.ID_HORA_DIA_LABORATORIO','=','gLab.ID_HORARIO_LABORATORIO')
                ->join('laboratorio as lab','lab.ID_LABORATORIO','=','hdLab.ID_LABORATORIO')
                ->join('dia as d','d.ID_DIA','=','hdLab.ID_DIA')
                ->join('hora_clase as h','h.ID_HORA','=','hdLab.ID_HORA')
                ->select('gLab.ID_GRUPOLAB','gLab.ESTADO_GC', 'd.NOMBRE_DIA', 'h.HORA_INICIO', 'h.HORA_FIN')
                ->where('aux.ID_AUXILIAR','=',"".$id."")
                ->orderBy('d.ID_DIA');
                $grupos = $grupos->get();

            $estudiantes = DB::select('SELECT DISTINCT insc.ID_INSCRIPCION, est.ID_ESTUDIANTE, est.CODIGO_SIS,est.NOMBRE_ESTUDIANTE,est.APELLIDO_ESTUDIANTE,COUNT(asis.CANTIDAD) as CANTIDAD ,AVG(com.NOTA_DOCENTE) as PROMEDIO ,gLab.ID_GRUPOLAB
                                        FROM inscripcion as insc
                                        JOIN comentario_portafolio as com
                                        JOIN estudiante as est
                                        JOIN asistencia as asis
                                        JOIN grupo_laboratorio as gLab
                                        WHERE insc.ID_INSCRIPCION=com.ID_INSCRIPCION AND asis.ID_INSCRIPCION=insc.ID_INSCRIPCION
                                        AND est.ID_ESTUDIANTE=insc.ID_ESTUDIANTE AND insc.ID_GRUPOLAB=gLab.ID_GRUPOLAB
                                        GROUP BY insc.ID_INSCRIPCION, est.ID_ESTUDIANTE, est.CODIGO_SIS,est.NOMBRE_ESTUDIANTE,est.APELLIDO_ESTUDIANTE,gLab.ID_GRUPOLAB
                                        ORDER BY est.APELLIDO_ESTUDIANTE ASC');

            $portafolio = DB::table('portafolio');
            $portafolio = $portafolio->get();

            return view('auxiliar/reportes.index',["portafolio"=>$portafolio, "grupos"=>$grupos,
                                          "estudiantes"=>$estudiantes]);
        }
    }
    public function create()
    {

    }
    public function store (StoreRequest $request)
    {

    }
    public function show($id)
    {
      return view('auxiliar/reportes.show');
    }
    public function edit($id)
    {

    }
    public function update(ComentarioFormRequest $request,$id)
    {

    }
    public function destroy($id)
    {

    }
    public function descargar($id, $archivo){
        $public_path = public_path();
        $url = $public_path."/archivosTIS/$id/".$archivo;
        return response()->download($url);
    }
    public function listarGrupos($idGrupo, $idEstudiante){
        $sesiones=DB::table('inscripcion as ins')
        ->join('practica_grupo as pg','pg.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('grupo_laboratorio as gl','gl.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->where('ESTADO_GC','=','1')
        ->where('pg.ID_GRUPOLAB','=',$idGrupo)
        ->where('ID_ESTUDIANTE','=', $idEstudiante);
        $sesiones = $sesiones->get();
        return view('estudiante.inscripcion.sesionMateria.principal',["sesiones"=>$sesiones]);

    }
// SELECT * FROM `comentario_portafolio` as cp
//   inner join inscripcion as ins on cp.ID_INSCRIPCION = ins.ID_INSCRIPCION
//       join practica_grupo as pgru on cp.ID_PRAC_GRUPO = pgru.ID_PRAC_GRUPO
//       join estudiante as est on ins.ID_ESTUDIANTE = est.ID_ESTUDIANTE
//       join grupo_laboratorio as grulab on ins.ID_GRUPOLAB = grulab.ID_GRUPOLAB
//       join docente_materia as docmat on grulab.ID_DOC_MAT = docmat.ID_DOCENTE_MATERIA
//       join materia as mat on docmat.ID_MATERIA = mat.ID_MATERIA
//       join docente as doc on docmat.ID_DOCENTE = doc.ID_DOCENTE
//       join auxiliar as aux on grulab.ID_AUX = aux.ID_AUXILIAR
//       join portafolio as port on port.ID_PORTAFOLIO = cp.ID_PORTAFOLIO
//       join asistencia as asis on cp.ID_PORTAFOLIO = asis.ID_INSCRIPCION
//     where aux.ID_AUXILIAR = '10001' and grulab.ID_GRUPOLAB = '1';
}
