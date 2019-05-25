<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table='comentario_portafolio';

    protected $primaryKey='ID_PORTAFOLIO';

    public $timestamps=false;

    protected $fillable =[
        'ID_INSCRIPCION',
        'ID_PRAC_GRUPO',
        'COMENTARIO_AUXILIAR',
        'NOTA_DOCENTE',
    ]; 

    protected $guarded =[

    ];
}
