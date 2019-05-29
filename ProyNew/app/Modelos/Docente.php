<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table='docente';

    protected $primaryKey='ID_DOCENTE';

    public $timestamps=false;

    protected $fillable =[
        'CONTRASENIA',
        'EMAIL',
        'NOMBRE_DOCENTE',
        'APELLIDO_DOCENTE',
        'TELEFONO',
        'CODIGO_SIS',
        'ESTADO'
    ]; 

    protected $guarded =[

    ];
}
