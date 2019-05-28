<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    protected $table= 'hora_clase';

    protected $primaryKey='ID_HORA';

    public $timestamps=false;

    protected $fillable=[
        'HORA_INICIO',
        'HORA_FIN',
    ];
}
