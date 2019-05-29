<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table='gestion';

    protected $primaryKey='ID_GESTION';

    public $timestamps=false;

    protected $fillable =[
        'NOMBRE_GESTION',
        'ESTADO'
    ]; 

    protected $guarded =[

    ];
}
