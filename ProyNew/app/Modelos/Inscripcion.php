<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model{
    protected $table='inscripcion';

    protected $primaryKey='ID_INSCRIPCION';

    public $timestamps=false;

    protected $fillable =[
        'ID_ESTUDIANTE',
        'ID_GRUPOLAB'
    ]; 

    protected $guarded =[

    ];
}
