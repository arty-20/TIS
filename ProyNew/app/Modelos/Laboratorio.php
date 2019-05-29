<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $table= 'laboratorio';

    protected $primaryKey='ID_LABORATORIO';

    public $timestamps=false;

    protected $fillable=[
        'NOMRE_LABORATORIO',
        'ESTADO',
    ];
}
