<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    protected $table='portafolio';


    public $timestamps=false;

    protected $fillable =[
       'ID_PORTAFOLIO',
       'RUTA_ARCHIVO',
       'ID_GESTION'
    ]; 

    protected $guarded =[

    ];
}
