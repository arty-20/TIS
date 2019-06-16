<?php

namespace App\Http\Controllers\estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Comentario;
use App\Modelos\Portafolio;
use App\Http\Requests\PortafolioFormRequest;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use DB;
class SesionMateriaController extends Controller
{
    public function __construct(){
    }

    public function listarSesiones($idGrupo, $idEstudiante){
        $sesiones=self::getSesiones($idGrupo, $idEstudiante);
        return view('estudiante.inscripcion.sesionMateria.principal',["sesiones"=>$sesiones]);

    }
    private function getSesiones($a , $b){
        $sesiones=DB::table('inscripcion as ins')
        ->join('practica_grupo as pg','pg.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('grupo_laboratorio as gl','gl.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->where('ESTADO_GC','=','1')
        ->where('pg.ID_GRUPOLAB','=',$a)
        ->where('ID_ESTUDIANTE','=', $b);
        $sesiones = $sesiones->get();
        return $sesiones;
    }
    public function buscarPortafolio($idGrupo, $idEstudiante,$idIns, $idPrac){
        $sesiones=self::getSesiones($idGrupo, $idEstudiante);
        $portafolio = DB::table('comentario_portafolio')
        ->where('ID_INSCRIPCION','=',"$idIns")
        ->where('ID_PRAC_GRUPO','=',"$idPrac")
        ->select('ID_PORTAFOLIO');
        $portafolio = $portafolio->get()->first();
        if($portafolio==null){
            $por=new Comentario;
            $por->ID_INSCRIPCION=$idIns;
            $por->ID_PRAC_GRUPO=$idPrac;
            $por->COMENTARIO_AUXILIAR="";
            $por->NOTA_DOCENTE=0;
            $por->save();
        }
        $portafolio1 = DB::table('comentario_portafolio as cp')
        ->join('portafolio as pm','pm.ID_PORTAFOLIO','=','cp.ID_PORTAFOLIO')
        ->where('ID_INSCRIPCION','=',$idIns)
        ->where('ID_PRAC_GRUPO','=',$idPrac);
        $portafolio1 = $portafolio1->get();
        $portafolio2 = DB::table('comentario_portafolio')
        ->where('ID_INSCRIPCION','=',"$idIns")
        ->where('ID_PRAC_GRUPO','=',"$idPrac")
        ->select('ID_PORTAFOLIO');
        $portafolio2 = $portafolio2->get()->first();
        $idp =$portafolio2->ID_PORTAFOLIO;
        $pm = DB::table('portafolio')
        ->where('ID_PORTAFOLIO','=',"$idp");
        $pm = $pm->get();
        return view('estudiante.inscripcion.sesionMateria.portafolio',[
            "sesiones"=>$sesiones,
            "portafolio1"=>$portafolio1,
            "idpor"=>$portafolio2->ID_PORTAFOLIO,
            "paquete"=>$pm]);
    }
    public function buscarPractica($idGrupo, $idEstudiante,$idIns, $idPrac,$i){
        $sesiones=self::getSesiones($idGrupo, $idEstudiante);
        $sesion=DB::table('inscripcion as ins')
        ->join('practica_grupo as pg','pg.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('grupo_laboratorio as gl','gl.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->where('ESTADO_GC','=','1')
        ->where('pg.ID_GRUPOLAB','=',$idGrupo)
        ->where('ID_ESTUDIANTE','=', $idEstudiante)
        ->where('ID_PRAC_GRUPO','=',$idPrac);
        $sesion = $sesion->get()->first();
        $portafolio1 = DB::table('comentario_portafolio as p')
        ->join('portafolio as pm','pm.ID_PORTAFOLIO','=','p.ID_PORTAFOLIO')
        ->where('ID_INSCRIPCION','=',$idIns)
        ->where('ID_PRAC_GRUPO','=',$idPrac);
        $portafolio1 = $portafolio1->get();
        return view('estudiante.inscripcion.sesionMateria.practicaAuxiliar',[
            "sesiones"=>$sesiones,
            "portafolio1"=>$portafolio1,
            "practica"=>$sesion->PRACTICA,
            "idDocente"=>self::buscarDocente($idPrac),
            "idPrac"=>$idGrupo,
	    "i"=>$i]);
    }
    public function prueba($id){
        return view('estudiante.inscripcion.sesionMateria.prueba',["idpor"=>$id]);
    }
    public function store(PortafolioFormRequest $request ){
        $port = new Portafolio;
        $id = $request->get('ID_PORTAFOLIO');
        $port->ID_PORTAFOLIO = $id;
        if(Input::hasFile('archivo')){
            $file = Input::file('archivo');
            $ruta_prueba = public_path()."/archivosTIS/$id/";
            File::makeDirectory($ruta_prueba,0777,true,true);
            $file->move($ruta_prueba, $file->getClientOriginalName());

            $port->RUTA_ARCHIVO = $file->getClientOriginalName();
        }
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
                $port->ID_GESTION = $idGestion1->ID_GESTION;
            }
        } 
        $port->save();
        return Redirect::back();
    }
    public function descargar($id, $archivo){
        $public_path = public_path();
        $url = $public_path."/archivosTIS/$id/".$archivo;
        return response()->download($url);
    }
    public function descargarPractica($idPrac, $idDoc, $i, $Practica){
        $url = public_path()."/archivosDoc/$idDoc/$idPrac/$i/".$Practica;
        return response()->download($url);
    }
    private function buscarDocente($id){
        $res = DB::table('practica_grupo as pg')
        ->join('grupo_laboratorio as gl','pg.ID_GRUPOLAB','=','gl.ID_GRUPOLAB')
        ->join('docente_materia as dm','gl.ID_DOC_MAT','=','dm.ID_DOCENTE_MATERIA')
        ->join('docente as d','dm.ID_DOCENTE','=','d.ID_DOCENTE')
        ->where('pg.ID_PRAC_GRUPO','=',"$id")
        ->select('d.ID_DOCENTE');
        $res = $res->get()->first();
        return $res->ID_DOCENTE;
    }
    public function listarCalificaciones($idGrup, $idEst){
        $ins = DB::table('inscripcion as i')
        ->where('i.ID_ESTUDIANTE','=',"$idEst")
        ->where('i.ID_GRUPOLAB','=',"$idGrup");
        $ins = $ins->get()->first();
        $idIns = $ins->ID_INSCRIPCION;
        $comentarioPortafolio = DB::table('comentario_portafolio as cp')
        ->join('practica_grupo as pg','cp.ID_PRAC_GRUPO','=','pg.ID_PRAC_GRUPO')
        ->where('cp.ID_INSCRIPCION','=',"$idIns");
        $comentarioPortafolio =$comentarioPortafolio->get();
        return view('estudiante.inscripcion.calificaciones',["comentario"=>$comentarioPortafolio]);
    }
}
