<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ComentarioPortafolio extends Model
{
    protected $table='comentario_portafolio';

    protected $primaryKey='ID_PORTAFOLIO';

    public $timestamps=false;

    protected $fillable =[
       // 'ID_PORTAFOLIO',
       // 'ID_INSCRIPCION',
       // 'ID_PRAC_GRUPO',
       // 'COMENTARIO_AUXILIAR',
       //'RUTA_ARCHIVO',
    ];

    protected $guarded =[

    ];
}
