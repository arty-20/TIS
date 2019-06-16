<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Horario;
use App\Modelos\Hora;
use App\Modelos\Dia;
use App\Modelos\Laboratorio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HorarioFormRequest;
use DB;

class HorarioController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        if($request){
            $query= trim($request->get('searchText'));
            $horario=DB::table('hora_dia_laboratorio as hdl')
            ->join('hora_clase as h', 'hdl.ID_HORA','=','h.ID_HORA')
            ->join('dia as d', 'hdl.ID_DIA','=','d.ID_DIA')
            ->join('laboratorio as l', 'hdl.ID_LABORATORIO','=','l.ID_LABORATORIO')
            ->select('hdl.ID_HORA_DIA_LABORATORIO','hdl.DISPONIBLE','l.NOMBRE_LABORATORIO','d.NOMBRE_DIA','h.HORA_INICIO','h.HORA_FIN')
            ->where('ESTADO_LAB','=','1')
            //->where('DISPONIBLE','=','1')
            ->orderBy('hdl.ID_HORA_DIA_LABORATORIO','asc')
            ->paginate(10);
            $laboratorio=DB::table('laboratorio as lab')
            ->select('lab.ID_LABORATORIO','NOMBRE_LABORATORIO','ESTADO')

            ->where('ESTADO','=','1')->orderBy('ID_LABORATORIO','asc');
            $laboratorio=$laboratorio->get();
            $dia=DB::table('dia')->get();
            $hora=DB::table('hora_clase')->get();
            return view('administrador.horario.index',["horario"=>$horario,"laboratorio"=>$laboratorio,"dia"=>$dia,"hora"=>$hora,"searchText"=>$query]);
        }
    }

    public function show($id){
        $horario=  DB::table('hora_dia_laboratorio as hdl')
            ->join('hora_clase as h', 'hdl.ID_HORA','=','h.ID_HORA')
            ->join('dia as d', 'hdl.ID_DIA','=','d.ID_DIA')
            ->join('laboratorio as l', 'hdl.ID_LABORATORIO','=','l.ID_LABORATORIO')
            ->select('hdl.ID_HORA_DIA_LABORATORIO','hdl.DISPONIBLE','l.NOMBRE_LABORATORIO','d.NOMBRE_DIA','h.HORA_INICIO','h.HORA_FIN')
            ->where('l.ID_LABORATORIO','=',$id)
            ->where('ESTADO_LAB','=','1')
            //->where('DISPONIBLE','=','1')
            ->orderBy('hdl.ID_HORA_DIA_LABORATORIO','desc')
            ->paginate(10);
            
        $dia= DB::table('dia');
        $dia=$dia->get();
        $hora=DB::table('hora_clase');
        $hora=$hora->get();
        $laboratorio=DB::table('laboratorio')->get();
        return view("administrador.horario.show",["horario"=>$horario]);
    }

    public function ocupado($id){
        $horario=Horario::findOrFail($id);
        $disp= $horario->DISPONIBLE;
        if($disp=='1'){
            $horario->DISPONIBLE='0';
        }else if($disp=='0'){
            $horario->DISPONIBLE='1';
        }
        $horario->update();
        return Redirect::back();
       // return Redirect::to("/administrador/horario");
    }

    public function listar($id){
        $horario=  DB::table('hora_dia_laboratorio as hdl')
            ->join('hora_clase as h', 'hdl.ID_HORA','=','h.ID_HORA')
            ->join('dia as d', 'hdl.ID_DIA','=','d.ID_DIA')
            ->join('laboratorio as l', 'hdl.ID_LABORATORIO','=','l.ID_LABORATORIO')
            ->select('hdl.ID_HORA_DIA_LABORATORIO','hdl.DISPONIBLE','l.NOMBRE_LABORATORIO','d.NOMBRE_DIA','h.HORA_INICIO','h.HORA_FIN')
            ->where('ESTADO_LAB','=','1')
            ->where('l.ID_LABORATORIO','=',$id)
            //->where('DISPONIBLE','=','1')
            ->orderBy('hdl.ID_HORA_DIA_LABORATORIO','asc')
            ->paginate(10);
        //$horario=$horario->get();
            $laboratorio=DB::table('laboratorio as lab')
            ->select('lab.ID_LABORATORIO','NOMBRE_LABORATORIO','ESTADO')

            ->where('ESTADO','=','1')->orderBy('ID_LABORATORIO','asc');
            $laboratorio=$laboratorio->get();    
            $dia=DB::table('dia')->get();
            $hora=DB::table('hora_clase')->get();
        return view("administrador.horario.laboratorios.labs",compact("horario"),["laboratorio"=>$laboratorio,"dia"=>$dia,"hora"=>$hora]);
    
    }

   
}
