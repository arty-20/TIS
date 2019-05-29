<?php

namespace App\Http\Controllers\Auxiliar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Estudiantes;
use App\ComentarioPortafolio;
//use proyecto\Estudiante;
use App\Auxiliar;
use App\Http\Requests\AuxiliarFormRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
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
            $query=trim($request->get('searchText'));

            $estudiantes=DB::table('comentario_portafolio as cp')
            ->join('inscripcion as ins', 'cp.ID_INSCRIPCION', '=', 'ins.ID_INSCRIPCION')
            ->join('practica_grupo as pgru', 'cp.ID_PRAC_GRUPO', '=', 'pgru.ID_PRAC_GRUPO')
            ->join('estudiante as est', 'ins.ID_ESTUDIANTE', '=', 'est.ID_ESTUDIANTE')
            ->join('grupo_laboratorio as grulab', 'ins.ID_GRUPOLAB', '=', 'grulab.ID_GRUPOLAB')
            ->join('docente_materia as docmat', 'grulab.ID_DOC_MAT', '=', 'docmat.ID_DOCENTE_MATERIA')
            ->join('materia as mat', 'docmat.ID_MATERIA', '=', 'mat.ID_MATERIA')
            ->join('docente as doc', 'docmat.ID_DOCENTE', '=', 'doc.ID_DOCENTE')
            ->join('hora_clase as hrcl', 'grulab.ID_HORARIO_LABORATORIO', '=', 'hrcl.ID_HORA')
            ->join('auxiliar as aux', 'grulab.ID_AUX', '=', 'aux.ID_AUXILIAR')
            ->where('aux.ID_AUXILIAR','=',"".$id."");
            //->where('aux.NOMBRE_AUXILIAR','=','Arturo');
            $estudiantes = $estudiantes->get();

            return view('auxiliar.index',["estudiantes"=>$estudiantes,"searchText"=>$query]);
        }
    }
    public function create()
    {
      $id = Session::get('id');
      $estudiantes=DB::table('comentario_portafolio as cp')
      ->join('inscripcion as ins', 'cp.ID_INSCRIPCION', '=', 'ins.ID_INSCRIPCION')
      ->join('practica_grupo as pgru', 'cp.ID_PRAC_GRUPO', '=', 'pgru.ID_PRAC_GRUPO')
      ->join('estudiante as est', 'ins.ID_ESTUDIANTE', '=', 'est.ID_ESTUDIANTE')
      ->join('grupo_laboratorio as grulab', 'ins.ID_GRUPOLAB', '=', 'grulab.ID_GRUPOLAB')
      ->join('docente_materia as docmat', 'grulab.ID_DOC_MAT', '=', 'docmat.ID_DOCENTE_MATERIA')
      ->join('materia as mat', 'docmat.ID_MATERIA', '=', 'mat.ID_MATERIA')
      ->join('docente as doc', 'docmat.ID_DOCENTE', '=', 'doc.ID_DOCENTE')
      ->join('hora_clase as hrcl', 'grulab.ID_HORARIO_LABORATORIO', '=', 'hrcl.ID_HORA')
      ->join('auxiliar as aux', 'grulab.ID_AUX', '=', 'aux.ID_AUXILIAR')
      //->where('aux.ID_AUXILIAR','=',"".$id."");
      ->where('aux.NOMBRE_AUXILIAR','=','Arturo');
      // ->where('est.ID_ESTUDIANTE','=',"".$id."");
      $estudiantes = $estudiantes->get();

      return view("auxiliar.coment",["estudiante"=>$estudiantes]);
    }
    public function store (StoreRequest $request)
    {
      $port = new ComentarioPortafolio();
      $port->COMENTARIO_AUXILIAR   = $request->get('comentario');

      $port->save();
      return Redirect::to('auxiliar.index');
    }
    public function show($id)
    {
      return view('auxiliar.show',["estudiante"=>Estudiantes::findOrFail($id)]);
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
      ->join('hora_clase as hrcl', 'grulab.ID_HORARIO_LABORATORIO', '=', 'hrcl.ID_HORA')
      ->join('auxiliar as aux', 'grulab.ID_AUX', '=', 'aux.ID_AUXILIAR')
      //->where('cp.ID_INSCRIPCION','=', ''.$id);
      ->where('aux.ID_AUXILIAR','=',"".$ida."");
      //->where('est.ID_ESTUDIANTE','=',"".$id."");
      $estudiantes = $estudiantes->get()->first();

      return view("auxiliar.edit",["estudiante"=>$estudiantes]);
    }
    public function update(UpdateRequest $request,$id)
    {
      $port = ComentarioPortafolio::findOrFail($id);
      $port->COMENTARIO_AUXILIAR   = $request->get('comentario');

      $port->update();
      return Redirect::to('auxiliar');
    }
    public function destroy($id)
    {

    }
}
