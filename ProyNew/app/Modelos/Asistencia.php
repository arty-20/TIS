<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
     protected $table='asistencia';

    protected $primaryKey='ID_INSCRIPCION';

    public $timestamps=false;

    protected $fillable =[

    ]; 

    protected $guarded =[

    ];
}