<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticaGrupo extends Model
{
     protected $table='practica_grupo';

    protected $primaryKey='ID_PRAC_GRUPO';

    public $timestamps=false;

    protected $fillable =[
       'ID_GRUPOLAB',
       'NOMBRE_SESION',
       'FECHA',
       'PRACTICA',
    ]; 

    protected $guarded =[

    ];
}
