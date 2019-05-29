<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class GrupoLaboratorio extends Model
{
    protected $table='grupo_laboratorio';
     
     protected $primaryKey='ID_GRUPOLAB';

     public $timestamps=false;

     protected $fillable =[
        'ID_DOC_MAT',
        'ID_HORA',
        'ID_AUX',
        'ESTADO_GC',
        'ID_HORARIO_LABORATORIO',
        'CANTIDAD_ESTUDIANTES',
        'ID_GESTION'
     ];
     protected $guarded = [
     ];
}
