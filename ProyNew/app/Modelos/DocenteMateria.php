<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class DocenteMateria extends Model
{
     protected $table= 'docente_materia';

    protected $primaryKey='ID_DOCENTE_MATERIA';

    public $timestamps=false;

    protected $fillable=[
        'ID_MATERIA',
        'ID_DOCENTE',
    ];
}
