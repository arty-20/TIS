<?php

namespace App\Http\Controllers\docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\PracticaGrupo;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PracticaGrupoFormRequest;
use Carbon\Carbon;
use DB;

class PracticaGrupoController extends Controller
{
    public function __construct(){

    }



    public function store(PracticaGrupoFormRequest $request){

	   	$practica = new PracticaGrupo;
    	$id = $request->get('ID_PRAC_GRUPO');
        $practica->ID_GRUPOLAB = $id;
 		$sesiones = DB::table('practica_grupo as pG')
    				->join('grupo_laboratorio as gLab','pG.ID_GRUPOLAB','=','gLab.ID_GRUPOLAB')
    				->select('pG.ID_GRUPOLAB')
    				->where('pG.ID_GRUPOLAB','=',$id)
		   			->count();
		 if($sesiones == 0){
		 	$practica->NOMBRE_SESION='Sesion 1';
		 }else{
		 	$practica->NOMBRE_SESION='Sesion '.($sesiones+1);
		 }


        $mytime = Carbon::now();
        $mytime = $mytime->format('Y-m-d');
        $practica->FECHA =$mytime;

        if(Input::hasFile('archivo')){
            $file = Input::file('archivo');
            $file->move(public_path()."/archivosTIS/sesiones/$id/", $file->getClientOriginalName());

            $practica->PRACTICA = $file->getClientOriginalName();
        }
        $practica->save();

		return redirect()->action(
			    'docente\PracticaGrupoController@mostrarGrupo', ['id' => $id]
			);



    }

    public function mostrarGrupo($id){
       $grupoLaboratorio=DB::table('grupo_laboratorio as gLab')
            ->join('docente_materia as gM','gM.ID_DOCENTE_MATERIA','=','gLab.ID_DOC_MAT')
            ->join('auxiliar as a','a.ID_AUXILIAR','=','gLab.ID_AUX')
            ->join('materia as m','gM.ID_MATERIA','=','m.ID_MATERIA')
            ->join('hora_dia_laboratorio as hdLab', 'hdLab.ID_HORA_DIA_LABORATORIO','=','gLab.ID_HORARIO_LABORATORIO')
            ->join('laboratorio as lab','lab.ID_LABORATORIO','=','hdLab.ID_LABORATORIO')
            ->join('dia as d','d.ID_DIA','=','hdLab.ID_DIA')
            ->join('hora_clase as h','h.ID_HORA','=','hdLab.ID_HORA')
            ->select('gLab.ID_GRUPOLAB','m.NOMBRE_MATERIA','a.NOMBRE_AUXILIAR','a.APELLIDO_AUXILIAR','gLab.ESTADO_GC', DB::raw('CONCAT( d.NOMBRE_DIA," ",h.HORA_INICIO," - ",h.HORA_FIN) as GRUPOLAB'))
            ->where('gLab.ID_GRUPOLAB','=',$id)
            ->groupBy('gLab.ID_GRUPOLAB','m.NOMBRE_MATERIA','a.NOMBRE_AUXILIAR','a.APELLIDO_AUXILIAR','gLab.ESTADO_GC','d.NOMBRE_DIA','h.HORA_INICIO','h.HORA_FIN')
            ->first();
     	$sesiones = DB::table('practica_grupo as pG')
			->join('grupo_laboratorio as gLab','pG.ID_GRUPOLAB','=','gLab.ID_GRUPOLAB')
			->select('pG.ID_GRUPOLAB')
			->where('pG.ID_GRUPOLAB','=',$id)
   			->count();


        return view("docente.grupoLaboratorio.mostrarGrupo",["grupoLaboratorio"=>$grupoLaboratorio,"sesiones"=>$sesiones,"idLab"=>$id]);


    }
}
