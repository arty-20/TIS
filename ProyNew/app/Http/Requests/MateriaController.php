<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Materia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MateriaFormRequest;
use DB;

class MateriaController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $materias=DB::table('materia')->where('NOMBRE_MATERIA','LIKE','%'.$query.'%')
            ->where ('ESTADO', '=', '1')
            ->orderBy('ID_MATERIA','asc')
            ->paginate(3);
            return view('administrador.materia.index',["materias"=>$materias,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administrador.materia.create");
    }
    public function store (MateriaFormRequest $request)
    {
        $pase=false;
        $materia=new Materia;
	$n = $request->get('NOMBRE_MATERIA');
        $materia->NOMBRE_MATERIA=$n;
        $materia->ESTADO='1'; 
        $materiaspasadas= DB::table('materia');
	$materiaspasadas=$materiaspasadas->get();
        foreach($materiaspasadas as $mat){
            $nombre= $mat->NOMBRE_MATERIA;
            if($n != $nombre){
                $pase=true;
            }else{
                $pase=false;
            }
        }
        if($materiaspasadas == null){
            $materia->save();
        }
        if($pase==true){
            $materia->save();
        }
        return Redirect::to('administrador/materia');
    }
    public function show($id)
    {
        return view("administrador.materia.show",["materia"=>Materia::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.materia.edit",["materia"=>Materia::findOrFail($id)]);
    }
    public function update(MateriaFormRequest $request,$id)
    {
        $materia=Materia::findOrFail($id);
        $materia->NOMBRE_MATERIA=$request->get('NOMBRE_MATERIA');
        $materia->update();
        return Redirect::to('administrador/materia');
    }
    public function destroy($id)
    {
        $materia=Materia::findOrFail($id);
        $materia->ESTADO='0';
        $materia->update();
        return Redirect::to('administrador/materia');
    }
}
