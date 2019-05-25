<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    protected $table='auxiliar';

    protected $primaryKey='ID_AUXILIAR';

    public $timestamps=false;

    protected $fillable =[
        'CONTRASENIA',
        'EMAIL',
        'NOMBRE_AUXILIAR',
        'APELLIDO_AUXILIAR',
        'CODIGO_SIS',
        'ESTADO'
    ]; 

    protected $guarded =[

    ];
}
