<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Gestion;
use App\Modelos\GrupoLaboratorio;
use App\Modelos\DocenteMateria;
use App\Modelos\Auxiliar;
use App\Modelos\Docente;
use App\Modelos\Materia;
use App\Modelos\Horario;
use App\Modelos\Hora;
use App\Modelos\Dia;
use App\Modelos\Laboratorio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GestionFormRequest;
use DB;


class GestionController extends Controller
{
    public function __construct(){
    }

    

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $gestiones=DB::table('gestion')->where('NOMBRE_GESTION','LIKE','%'.$query.'%')
            ->where ('ESTADO', '=', '1')
            ->orderBy('ID_GESTION','desc')
            ->paginate(3);
            return view('administrador.gestion.index',["gestiones"=>$gestiones,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administrador.gestion.create");
    }
    public function store (GestionFormRequest $request)
    {
        $gestion=new Gestion;
        $gestion->NOMBRE_GESTION=$request->get('NOMBRE_GESTION');
        $gestion->INICIO_GESTION=$request->get('INICIO_GESTION');
        $gestion->FIN_GESTION=$request->get('FIN_GESTION');
        $gestion->ESTADO='1';
        $gestionpasada= DB::table('gestion')
        ->select('gestion.*')
        ->where('ESTADO','=','1');
        $gestionpasada=$gestionpasada->get();
        $pase=true;
        foreach ($gestionpasada as $gest) {
            $inicio=$gest->INICIO_GESTION;
            $fin=$gest->FIN_GESTION;
            if(($gestion->INICIO_GESTION >= $inicio) && ($gestion->INICIO_GESTION <= $fin)){
                $pase=false;   
            }
            if(($gestion->FIN_GESTION >= $inicio) && ($gestion->FIN_GESTION <= $fin)){
                $pase=false;
            }
        }
        if($pase==true){
            $gestion->save();
        }
        return Redirect::to('administrador/gestion');
    }

    

    public function show($id)
    {
        return view("administrador.gestion.show",["gestion"=>Gestion::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.gestion.edit",["gestion"=>Gestion::findOrFail($id)]);
    }
    public function update(GestionFormRequest $request,$id)
    {
        $gestion=Gestion::findOrFail($id);
        $gestion->NOMBRE_GESTION=$request->get('NOMBRE_GESTION');
        $gestion->INICIO_GESTION=$request->get('INICIO_GESTION');
        $gestion->FIN_GESTION=$request->get('FIN_GESTION');
        $gestion->update();
        return Redirect::to('administrador/gestion');
    }
    public function destroy($id)
    {
        $gestion=Gestion::findOrFail($id);
        $gestion->ESTADO='0';
        $gestion->update();
        return Redirect::to('administrador/gestion');
    }

    public function listGestiones($id){
        $lista=DB::table('grupo_laboratorio as gl')
        ->join('gestion as g', 'gl.ID_GESTION','=','g.ID_GESTION')
        ->select('g.ID_GESTION','gl.ID_GRUPOLAB','g.NOMBRE_GESTION')
        ->where('gl.ID_GESTION','=',$id);
        $lista= $lista->get();
        return view('administrador.gestion.lista.datosGestion',["lista"=>$lista]);
    }

    public function listGestion($id){

        $lista=DB::table('gestion as g')
        ->join('grupo_laboratorio as gl', 'g.ID_GESTION','=','gl.ID_GESTION')
        ->join('docente_materia as dm', 'gl.ID_DOC_MAT','=','dm.ID_DOCENTE_MATERIA')
        ->join('auxiliar as aux', 'gl.ID_AUX','=','aux.ID_AUXILIAR')
        ->join('docente as doc', 'dm.ID_DOCENTE','=','doc.ID_DOCENTE')
        ->join('materia as mat', 'dm.ID_MATERIA','=','mat.ID_MATERIA')
        ->join('hora_dia_laboratorio as hdl','gl.ID_HORARIO_LABORATORIO','=','hdl.ID_HORA_DIA_LABORATORIO')
        ->join('hora_clase as h','hdl.ID_HORA','=','h.ID_HORA')
        ->join('dia as d','d.ID_DIA','=','hdl.ID_DIA')
        ->join('laboratorio as lab', 'lab.ID_LABORATORIO', '=','hdl.ID_LABORATORIO')
        ->select('g.ID_GESTION','gl.ID_GRUPOLAB','g.NOMBRE_GESTION','d.NOMBRE_DIA','lab.NOMBRE_LABORATORIO','h.HORA_INICIO',
                'h.HORA_FIN','doc.NOMBRE_DOCENTE','doc.APELLIDO_DOCENTE','aux.NOMBRE_AUXILIAR',
                'aux.APELLIDO_AUXILIAR','mat.NOMBRE_MATERIA','dm.ID_DOCENTE_MATERIA','hdl.ID_HORA_DIA_LABORATORIO')
        ->where('g.ID_GESTION','=',$id)
        ->paginate(10);
        return view('administrador.gestion.lista.datosGestion',["lista"=>$lista]);
    }

}
