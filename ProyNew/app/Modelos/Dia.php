<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table= 'dia';

    protected $primaryKey='ID_DIA';

    public $timestamps=false;

    protected $fillable=[
        'NOMBRE_DIA',
    ];
}
