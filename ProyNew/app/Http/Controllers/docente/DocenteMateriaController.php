<?php

namespace App\Http\Controllers\docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modelos\DocenteMateria;
use App\Http\Requests\DocenteMateriaFormRequest;
use DB;
use Session;

class DocenteMateriaController extends Controller
{
    public function store(DocenteMateriaFormRequest $request){
		$id = Session::get('id');
		
    	$docMat = new DocenteMateria;
    	$docMat->ID_MATERIA = $request->get('ID_MATERIA');
    	$docMat->ID_DOCENTE = $id;
    	$docMat->save();

    	return Redirect::to('docente');

    }
}
