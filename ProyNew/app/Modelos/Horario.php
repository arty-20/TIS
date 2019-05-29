<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table= 'hora_dia_laboratorio';

    protected $primaryKey='ID_HORA_DIA_LABORATORIO';

    public $timestamps=false;

    protected $fillable=[
        'ID_LABORATORIO',
        'ID_DIA',
        'ID_HORA',
        'DISPONIBLE',
        'ESTADO_LAB',
    ];
}
