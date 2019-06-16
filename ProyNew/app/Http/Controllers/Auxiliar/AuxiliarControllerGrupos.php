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
use App\Modelos\GrupoLaboratorio;
use App\Modelos\HoraDiaLaboratorio;
use App\Modelos\Hora;
use App\Modelos\Dia;
use App\Http\Requests\AuxiliarFormRequest;
use App\Http\Requests\ComentarioFormRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use DB;
use Session;


class AuxiliarControllerGrupos extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
      $id = Session::get('id');
        if ($request)
        {
            $query=trim($request->get('searchText'));

            $practicag=DB::table('practica_grupo as pgru')
            ->join ('grupo_laboratorio as grulab', 'pgru.ID_GRUPOLAB', '=', 'grulab.ID_GRUPOLAB')
            ->join ('docente_materia as docmat', 'grulab.ID_DOC_MAT', '=', 'docmat.ID_DOCENTE_MATERIA')
            ->join ('docente as doc', 'docmat.ID_DOCENTE', '=', 'doc.ID_DOCENTE')
            ->orderBy('pgru.FECHA','desc');
            $practicag = $practicag->get();

            $grupoaux=DB::table('grupo_laboratorio as grulab')
            ->join('auxiliar as aux', 'grulab.ID_AUX', '=', 'aux.ID_AUXILIAR')
            ->join('docente_materia as docmat', 'grulab.ID_DOC_MAT', '=', 'docmat.ID_DOCENTE_MATERIA')
            ->join('materia as mat', 'docmat.ID_MATERIA', '=', 'mat.ID_MATERIA')
            ->join('docente as doc', 'docmat.ID_DOCENTE', '=', 'doc.ID_DOCENTE')
            ->join('hora_dia_laboratorio as hdlab', 'grulab.ID_HORARIO_LABORATORIO', '=', 'hdlab.ID_HORA_DIA_LABORATORIO')
            ->join('dia as d', 'hdlab.ID_DIA', '=', 'd.ID_DIA')
            ->join('hora_clase as hc', 'hdlab.ID_HORA', '=', 'hc.ID_HORA')
            ->where('aux.ID_AUXILIAR', '=', "".$id."");
            $grupoaux = $grupoaux->get();

            $portafolio = DB::table('portafolio');
            $portafolio = $portafolio->get();
            return view('auxiliar.index',["portafolio"=>$portafolio,
                                                "practicag"=>$practicag,
                                                "grupoaux"=>$grupoaux,
                                                "searchText"=>$query]);
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
      return view('auxiliar.show');
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
}
