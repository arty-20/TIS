<?php

namespace App\Http\Controllers\docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Modelos\PracticaGrupo;
use App\Modelos\ComentarioPortafolio;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PracticaGrupoFormRequest;
use App\Http\Requests\ComentarioFormRequest;
use Carbon\Carbon;
use Session;
use DB;
use PDF;

class PracticaGrupoController extends Controller
{
    public function __construct(){

    }

    public function store(PracticaGrupoFormRequest $request){
        $numero=0;
        $idD = Session::get('id');

	   	$practica = new PracticaGrupo;
    	$id = $request->get('ID_PRAC_GRUPO');
        $practica->ID_GRUPOLAB = $id;
 		$sesiones = DB::table('practica_grupo as pG')
    				->join('grupo_laboratorio as gLab','pG.ID_GRUPOLAB','=','gLab.ID_GRUPOLAB')
    				->select('pG.ID_GRUPOLAB')
    				->where('pG.ID_GRUPOLAB','=',$id)
                    ->count();

		 if($sesiones >= 0){
            $practica->NOMBRE_SESION='Sesion '.($sesiones+1);
            $numero=$sesiones+1;
		 }


        $mytime = Carbon::now();
        $mytime = $mytime->format('Y-m-d');
        $practica->FECHA =$mytime;

        if(Input::hasFile('archivo')){
            $idD = Session::get('id');
            $file = Input::file('archivo');
            $ruta = public_path()."/archivosDoc/$idD/$id/$numero/";
            File::makeDirectory($ruta,0777,true,true);
            $file->move($ruta, $file->getClientOriginalName());

            $practica->PRACTICA = $file->getClientOriginalName();
        }
        $practica->save();
        return Redirect::back();
    }

    public function update(ComentarioFormRequest $request,$id){
        $com = ComentarioPortafolio::findOrFail($id);
        $com->NOTA_DOCENTE = $request->NOTA_DOCENTE;
        $com->save();
        echo "<script>history.go(-2);</script>";
      }


    public function descargar($id, $archivo,$i){
        $public_path = public_path();
        $idD = Session::get('id');
        $url = $public_path."/archivosDoc/$idD/$id/$i/".$archivo;
        return response()->download($url);
    }

    public function descargarArchivoEstudiante($id, $archivo){
        $public_path = public_path();
        $url = $public_path."/archivosTIS/$id/".$archivo;
        return response()->download($url);
    }

    public function reporte($idM){
        $idD = Session::get('id');


        $docenteMateria=DB::table('docente_materia as dm')
                        ->where('dm.ID_DOCENTE','=',$idD)
                        ->where('dm.ID_MATERIA','=',$idM)
                        ->first();

        $grupos=DB::table('grupo_laboratorio as gLab')
                ->join('docente_materia as dM', 'gLab.ID_DOC_MAT','=','dM.ID_DOCENTE_MATERIA')
                ->join('docente as doc', 'doc.ID_DOCENTE','=','dM.ID_DOCENTE')
                ->join('materia as mat', 'mat.ID_MATERIA','=','dM.ID_MATERIA')
                ->join('hora_dia_laboratorio as hdLab', 'hdLab.ID_HORA_DIA_LABORATORIO','=','gLab.ID_HORARIO_LABORATORIO')
                ->join('laboratorio as lab','lab.ID_LABORATORIO','=','hdLab.ID_LABORATORIO')
                ->join('dia as d','d.ID_DIA','=','hdLab.ID_DIA')
                ->join('hora_clase as h','h.ID_HORA','=','hdLab.ID_HORA')
                ->select('gLab.ID_GRUPOLAB','gLab.ESTADO_GC', 'd.NOMBRE_DIA', 'h.HORA_INICIO', 'h.HORA_FIN')
                ->where('dM.ID_DOCENTE_MATERIA','=',$docenteMateria->ID_DOCENTE_MATERIA)
                ->orderBy('d.ID_DIA');
                $grupos = $grupos->get();


            $estudiantes = DB::select('SELECT DISTINCT insc.ID_INSCRIPCION, est.ID_ESTUDIANTE, est.CODIGO_SIS,est.NOMBRE_ESTUDIANTE,est.APELLIDO_ESTUDIANTE,COUNT(asis.CANTIDAD) as CANTIDAD ,AVG(com.NOTA_DOCENTE) as PROMEDIO ,gLab.ID_GRUPOLAB
                                        FROM inscripcion as insc
                                        JOIN comentario_portafolio as com
                                        JOIN estudiante as est
                                        JOIN asistencia as asis
                                        JOIN grupo_laboratorio as gLab
					WHERE insc.ID_INSCRIPCION=com.ID_INSCRIPCION AND asis.ID_INSCRIPCION=insc.ID_INSCRIPCION
                                        AND est.ID_ESTUDIANTE=insc.ID_ESTUDIANTE AND insc.ID_GRUPOLAB=gLab.ID_GRUPOLAB AND gLab.ID_DOC_MAT=:id
                                        GROUP BY insc.ID_INSCRIPCION, est.ID_ESTUDIANTE, est.CODIGO_SIS,est.NOMBRE_ESTUDIANTE,est.APELLIDO_ESTUDIANTE,gLab.ID_GRUPOLAB
                                        ORDER BY est.APELLIDO_ESTUDIANTE ASC',['id'=>$docenteMateria->ID_DOCENTE_MATERIA]);


            $materia= DB::table('materia as m')
                    ->where('m.ID_MATERIA','=',"".$idM."")
                    ->first();
        return view("docente.grupoLaboratorio.reporte",["materia"=>$materia,"estudiantes"=>$estudiantes,"grupos"=>$grupos]);
    }

    public function mostrarGrupo($idM,$id){
        $idD = Session::get('id');

        $grupos=DB::table('grupo_laboratorio as gLab')
        ->join('docente_materia as dM', 'gLab.ID_DOC_MAT','=','dM.ID_DOCENTE_MATERIA')
        ->join('docente as doc', 'doc.ID_DOCENTE','=','dM.ID_DOCENTE')
        ->join('materia as mat', 'mat.ID_MATERIA','=','dM.ID_MATERIA')
        ->join('hora_dia_laboratorio as hdLab', 'hdLab.ID_HORA_DIA_LABORATORIO','=','gLab.ID_HORARIO_LABORATORIO')
        ->join('laboratorio as lab','lab.ID_LABORATORIO','=','hdLab.ID_LABORATORIO')
        ->join('dia as d','d.ID_DIA','=','hdLab.ID_DIA')
        ->join('hora_clase as h','h.ID_HORA','=','hdLab.ID_HORA')
        ->select('gLab.ID_GRUPOLAB','gLab.ESTADO_GC', 'd.NOMBRE_DIA', 'h.HORA_INICIO', 'h.HORA_FIN')
        ->where('dM.ID_DOCENTE','=',$idD)
        ->where('dM.ID_MATERIA','=',$idM)
        ->orderBy('d.ID_DIA');
        $grupos = $grupos->get();

        $materia= DB::table('materia as m')
        ->where('m.ID_MATERIA','=',"".$idM."")
        ->first();


        $grupoLaboratorio=DB::table('grupo_laboratorio as gLab')
            ->join('docente_materia as gM','gM.ID_DOCENTE_MATERIA','=','gLab.ID_DOC_MAT')
            ->join('auxiliar as a','a.ID_AUXILIAR','=','gLab.ID_AUX')
            ->join('materia as m','gM.ID_MATERIA','=','m.ID_MATERIA')
            ->join('hora_dia_laboratorio as hdLab', 'hdLab.ID_HORA_DIA_LABORATORIO','=','gLab.ID_HORARIO_LABORATORIO')
            ->join('laboratorio as lab','lab.ID_LABORATORIO','=','hdLab.ID_LABORATORIO')
            ->join('dia as d','d.ID_DIA','=','hdLab.ID_DIA')
            ->join('hora_clase as h','h.ID_HORA','=','hdLab.ID_HORA')
            ->select('gLab.ID_GRUPOLAB','lab.NOMBRE_LABORATORIO','m.NOMBRE_MATERIA','a.NOMBRE_AUXILIAR','a.APELLIDO_AUXILIAR','gLab.ESTADO_GC', DB::raw('CONCAT( d.NOMBRE_DIA," ",h.HORA_INICIO," - ",h.HORA_FIN) as GRUPOLAB'))
            ->where('gLab.ID_GRUPOLAB','=',$id)
            ->groupBy('gLab.ID_GRUPOLAB','lab.NOMBRE_LABORATORIO','m.NOMBRE_MATERIA','a.NOMBRE_AUXILIAR','a.APELLIDO_AUXILIAR','gLab.ESTADO_GC','d.NOMBRE_DIA','h.HORA_INICIO','h.HORA_FIN')
            ->first();

        $sesiones = DB::table('practica_grupo as pG')
            ->join('grupo_laboratorio as gLab','pG.ID_GRUPOLAB','=','gLab.ID_GRUPOLAB')
            ->select('pG.ID_GRUPOLAB')
            ->where('pG.ID_GRUPOLAB','=',$id)
            ->count();

        $practicas =DB::table('practica_grupo as pG')
            ->join('grupo_laboratorio as gLab','pG.ID_GRUPOLAB','=','gLab.ID_GRUPOLAB')
            ->select('gLab.ID_GRUPOLAB','pG.NOMBRE_SESION','pG.FECHA','pG.PRACTICA')
            ->groupBy('gLab.ID_GRUPOLAB','pG.NOMBRE_SESION','pG.FECHA','pG.PRACTICA')
            ->where('pG.ID_GRUPOLAB','=',$id)
            ->get();

        $estudiantes=DB::table('inscripcion as estLab')
                    ->join('estudiante as e','estLab.ID_ESTUDIANTE','=','e.ID_ESTUDIANTE')
                    ->select('estLab.ID_GRUPOLAB','estLab.ID_ESTUDIANTE','e.CODIGO_SIS','e.NOMBRE_ESTUDIANTE','e.APELLIDO_ESTUDIANTE',DB::raw('CONCAT(e.NOMBRE_ESTUDIANTE," ",e.APELLIDO_ESTUDIANTE) as ESTUDIANTE'))
                    ->where('estLab.ID_GRUPOLAB','=',$id)
                    ->orderBy('e.APELLIDO_ESTUDIANTE')
                    ->get();

        return view("docente.grupoLaboratorio.mostrarGrupo",["grupoLaboratorio"=>$grupoLaboratorio,"sesiones"=>$sesiones,"estudiantes"=>$estudiantes,"practicas"=>$practicas,"grupos"=>$grupos, "materia"=>$materia, "idLab"=>$id,"idMateria"=>$idM]);


    }
    public function mostrarPortafolio($g,$id){

        $portafolio = DB::table('inscripcion as inscr')
                ->join('estudiante as e','e.ID_ESTUDIANTE','=','inscr.ID_ESTUDIANTE')
                ->join('practica_grupo as pG','pG.ID_GRUPOLAB','=','inscr.ID_GRUPOLAB')
                ->join('comentario_portafolio as com','com.ID_PRAC_GRUPO','=','pG.ID_PRAC_GRUPO')
                ->join('portafolio as por','por.ID_PORTAFOLIO','=','com.ID_PORTAFOLIO')
                ->select('por.ID_PORTAFOLIO','com.ID_PRAC_GRUPO','e.ID_ESTUDIANTE','pG.NOMBRE_SESION','com.COMENTARIO_AUXILIAR','com.NOTA_DOCENTE','por.RUTA_ARCHIVO')
                ->where('pG.ID_GRUPOLAB','=',$g)
                ->where('e.ID_ESTUDIANTE','=',$id)
                ->get();

        $datos = DB::table('estudiante as es')
                ->where('es.ID_ESTUDIANTE','=',$id)
                ->get() ->first();

        $sesiones= DB::table('practica_grupo as pG')
                    ->where('pG.ID_GRUPOLAB','=',$g)
                    ->get();

        return view("docente.grupoLaboratorio.portafolio",["portafolio"=>$portafolio, "datos"=>$datos,"sesiones"=>$sesiones]);

    }

    public function mostrarSesion($glab,$est,$idPrac){

        $portafolio = DB::table('inscripcion as inscr')
                ->join('estudiante as e','e.ID_ESTUDIANTE','=','inscr.ID_ESTUDIANTE')
                ->join('practica_grupo as pG','pG.ID_GRUPOLAB','=','inscr.ID_GRUPOLAB')
                ->join('comentario_portafolio as com','com.ID_PRAC_GRUPO','=','pG.ID_PRAC_GRUPO')
                ->join('portafolio as por','por.ID_PORTAFOLIO','=','com.ID_PORTAFOLIO')
                ->select('por.ID_PORTAFOLIO','com.ID_PRAC_GRUPO','e.ID_ESTUDIANTE','pG.NOMBRE_SESION','com.COMENTARIO_AUXILIAR','com.NOTA_DOCENTE','por.RUTA_ARCHIVO')
                ->where('pG.ID_GRUPOLAB','=',$glab)
                ->where('pG.ID_PRAC_GRUPO','=',$idPrac)
                ->where('e.ID_ESTUDIANTE','=',$est)
                ->get();

        $datos = DB::table('estudiante as es')
                ->where('es.ID_ESTUDIANTE','=',$est)
                ->get() ->first();

        $sesiones= DB::table('practica_grupo as pG')
                    ->where('pG.ID_GRUPOLAB','=',$glab)
                    ->get();

        return view("docente.grupoLaboratorio.sesiones",["portafolio"=>$portafolio,"datos"=>$datos,"sesiones"=>$sesiones]);

    }

    public function editarNota($id){

        $portafolio = DB::table('inscripcion as inscr')
                ->join('estudiante as e','e.ID_ESTUDIANTE','=','inscr.ID_ESTUDIANTE')
                ->join('practica_grupo as pG','pG.ID_GRUPOLAB','=','inscr.ID_GRUPOLAB')
                ->join('comentario_portafolio as com','com.ID_PRAC_GRUPO','=','pG.ID_PRAC_GRUPO')
                ->join('portafolio as por','por.ID_PORTAFOLIO','=','com.ID_PORTAFOLIO')
                ->select('com.ID_PORTAFOLIO','com.ID_PRAC_GRUPO','e.ID_ESTUDIANTE','e.NOMBRE_ESTUDIANTE','e.APELLIDO_ESTUDIANTE','pG.NOMBRE_SESION','com.COMENTARIO_AUXILIAR','com.NOTA_DOCENTE','por.RUTA_ARCHIVO')
                ->where('com.ID_PORTAFOLIO','=',$id)
                ->first();

        return view("docente.grupoLaboratorio.editarNota",["portafolio"=>$portafolio]);

    }


}
