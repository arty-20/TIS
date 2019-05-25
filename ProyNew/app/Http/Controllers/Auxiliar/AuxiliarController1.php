<?php

namespace App\Http\Controllers\Auxiliareses22;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Estudiantes;
use App\ComentarioPortafolio;
//use proyecto\Estudiante;
use App\Auxiliar;
use App\Http\Requests\AuxiliarFormRequest;
use DB;


class AuxiliarController1 extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            // $estudiantes=DB::table('estudiante')->where('NOMBRE_ESTUDIANTE','LIKE','%'.$query.'%')
            // // ->where ('grupo','=','1')
            // ->orderBy('ID_ESTUDIANTE')
            // ->paginate(10);
            $estudiantes=DB::table('comentario_portafolio as cp')
            // select
            // estudiante.NOMBRE_ESTUDIANTE,
            // practica_grupo.NOMBRE_SESION,
            // practica_grupo.FECHA,
            // practica_grupo.PRACTICA,
            // docente.NOMBRE_DOCENTE,
            // hora_clase.HORA_INICIO,
            // hora_clase.HORA_FIN,
            // auxiliar.NOMBRE_AUXILIAR
            ->join('inscripcion as ins', 'cp.ID_INSCRIPCION', '=', 'ins.ID_INSCRIPCION')
            ->join('practica_grupo as pgru', 'cp.ID_PRAC_GRUPO', '=', 'pgru.ID_PRAC_GRUPO')
            ->join('estudiante as est', 'ins.ID_ESTUDIANTE', '=', 'est.ID_ESTUDIANTE')
            ->join('grupo_laboratorio as grulab', 'ins.ID_GRUPOLAB', '=', 'grulab.ID_GRUPOLAB')
            ->join('docente_materia as docmat', 'grulab.ID_DOC_MAT', '=', 'docmat.ID_DOCENTE_MATERIA')
            ->join('materia as mat', 'docmat.ID_MATERIA', '=', 'mat.ID_MATERIA')
            ->join('docente as doc', 'docmat.ID_DOCENTE', '=', 'doc.ID_DOCENTE')
            ->join('hora_clase as hrcl', 'grulab.ID_HORARIO_LABORATORIO', '=', 'hrcl.ID_HORA')
            ->join('auxiliar as aux', 'grulab.ID_AUX', '=', 'aux.ID_AUXILIAR')
            ->where('aux.NOMBRE_AUXILIAR','=','Arturo');
            $estudiantes = $estudiantes->get();

            return view('auxiliar.index',["estudiantes"=>$estudiantes,"searchText"=>$query]);
        }
    }
    public function create()
    {
      return view("auxiliar.coment",["estudiante"=>Estudiantes::findOrFail($id)]);
    }
    public function store (AuxiliarFormRequest $request)
    {
        // $aux = new estudiante();
        // $aux->tipo_asignatura = $request->input('comentario');
        // $aux->save();
        // return redirect()->route('auxiliar.index');
        //
        $est=new Portafolios;
        $est->COMENTARIO_AUXILIAR=$request->get('comentario');
        $est->condicion='1';
        $est->save();
        return Redirect::to('');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {

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
      ->where('aux.NOMBRE_AUXILIAR','=','Arturo')
      ->where('est.ID_ESTUDIANTE','=',"".$id."");
      $estudiantes = $estudiantes->get();

      return view("auxiliar.edit",["estudiante"=>$estudiantes]);
    }
    public function update(AuxiliarFormRequest $request,$id)
    {
        // $est = Estudiantes::find($id);
        // $est->NOMBRE_ESTUDIANTE = $request->input('NOMBRE_ESTUDIANTE');
        // $aux->save();
        // return redirect()->route('auxiliar.index');
        //
        //$estudiante=Portafolios::findOrFail($id);
        $aux=Portafolios::findOrFail($id);
        $aux->COMENTARIO_AUXILIAR=$request->get('comentario');
        $aux->update();
        return Redirect::to('auxiliar');
    }
    public function destroy($id)
    {

    }
}
