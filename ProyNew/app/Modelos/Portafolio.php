<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    protected $table='portafolio';

    protected $primaryKey='ID_PORTAFOLIO';

    public $timestamps=false;

    protected $fillable =[
       'ID_PORTAFOLIO',
       'RUTA_ARCHIVO',
       'ID_GESTION'
    ];

    protected $guarded =[

    ];
}
