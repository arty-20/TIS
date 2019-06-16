<?php

namespace App\Http\Controllers\Auxiliar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Estudiantes;
use App\Modelos\ComentarioPortafolio;
use App\Auxiliar;
use App\Modelos\Portafolio;
use App\Http\Requests\AuxiliarFormRequest;
use App\Http\Requests\ComentarioFormRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

use DB;
use Session;


class AuxiliarController1 extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
      $id = Session::get('id');
        if ($request)
        {

        }
    }
    public function create()
    {

    }
    public function store (StoreRequest $request)
    {
      $port = new ComentarioPortafolio();
      $port->NOTA_DOCENTE         = $request->get('nota');

      $port->save();
      return Redirect::to('auxiliar/grupos.index');
    }
    public function show($id)
    {
      return view('auxiliar/grupos.show',["estudiante"=>Estudiantes::findOrFail($id)]);
    }
    public function edit($id)
    {
      $ida = Session::get('id');
      $estudiantes=DB::table('comentario_portafolio as cp')
      ->join('inscripcion as ins', 'cp.ID_INSCRIPCION', '=', 'ins.ID_INSCRIPCION')
      ->join('practica_grupo as pgru', 'cp.ID_PRAC_GRUPO', '=', 'pgru.ID_PRAC_GRUPO')
      ->join('estudiante as est', 'ins.ID_ESTUDIANTE', '=', 'est.ID_ESTUDIANTE')
      ->join('grupo_laboratorio as grulab', 'ins.ID_GRUPOLAB', '=', 'grulab.ID_GRUPOLAB')
      ->join('docente_materia as docmat', 'grulab.ID_DOC_MAT', '=', 'docmat.ID_DOCENTE_MATERIA')
      ->join('materia as mat', 'docmat.ID_MATERIA', '=', 'mat.ID_MATERIA')
      ->join('docente as doc', 'docmat.ID_DOCENTE', '=', 'doc.ID_DOCENTE')
      ->join('auxiliar as aux', 'grulab.ID_AUX', '=', 'aux.ID_AUXILIAR')
      ->where('cp.ID_PORTAFOLIO','=',"".$id."")
      ;
      $estudiantes = $estudiantes->get();

      return view("auxiliar/grupos.edit",["estudiante"=>$estudiantes]);
    }
    public function update(ComentarioFormRequest $request,$id)
    {
      $port = ComentarioPortafolio::findOrFail($id);
      $port->COMENTARIO_AUXILIAR   = $request->get('comentario');
      //$port->CANTIDAD              = $request->increment();
      //$port->NOTA_DOCENTE         = $request->get('nota');

      $port->update();

      return Redirect::to('auxiliar');
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
    public function listarEstudiantes($idAux, $idGrupo){
      //$query=trim($request->get('searchText'));

      $estudiantes=DB::table('comentario_portafolio as cp')
      ->join('inscripcion as ins', 'cp.ID_INSCRIPCION', '=', 'ins.ID_INSCRIPCION')
      ->join('practica_grupo as pgru', 'cp.ID_PRAC_GRUPO', '=', 'pgru.ID_PRAC_GRUPO')
      ->join('estudiante as est', 'ins.ID_ESTUDIANTE', '=', 'est.ID_ESTUDIANTE')
      ->join('grupo_laboratorio as grulab', 'ins.ID_GRUPOLAB', '=', 'grulab.ID_GRUPOLAB')
      ->join('docente_materia as docmat', 'grulab.ID_DOC_MAT', '=', 'docmat.ID_DOCENTE_MATERIA')
      ->join('materia as mat', 'docmat.ID_MATERIA', '=', 'mat.ID_MATERIA')
      ->join('docente as doc', 'docmat.ID_DOCENTE', '=', 'doc.ID_DOCENTE')
      ->join('auxiliar as aux', 'grulab.ID_AUX', '=', 'aux.ID_AUXILIAR')
      ->join('portafolio as port', 'port.ID_PORTAFOLIO', '=', 'cp.ID_PORTAFOLIO')
      ->join('asistencia as asis', 'cp.ID_PORTAFOLIO', '=', 'asis.ID_INSCRIPCION')
      ->where('aux.ID_AUXILIAR','=',"".$idAux."")
      ->where('grulab.ID_GRUPOLAB','=',"".$idGrupo."")
      ->orderBy('port.ID_PORTAFOLIO','asc');
      $estudiantes = $estudiantes->get();

      $portafolio = DB::table('portafolio');
      $portafolio = $portafolio->get();

      // $asistencia = DB::table('asistencia');
      // $portafolio = $portafolio->get();

      return view('auxiliar/grupos.index',["portafolio"=>$portafolio,
                                    "estudiantes"=>$estudiantes]);
    }
}
