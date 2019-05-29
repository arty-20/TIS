<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table='materia';

    protected $primaryKey='ID_MATERIA';

    public $timestamps=false;

    protected $fillable =[
       'NOMBRE_MATERIA',
       'ESTADO'
    ]; 

    protected $guarded =[

    ];
}
