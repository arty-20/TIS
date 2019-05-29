<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class HoraDiaLaboratorio extends Model
{
   protected $table='hora_dia_laboratorio';
     
     protected $primaryKey='ID_HORA_DIA_LABORATORIO';

     public $timestamps=false;

     protected $fillable =[
        'ID-LABORATORIO',
        'ID_DIA',
        'ID_HORA',
        'DISPONIBLE',
        'ESTADO_LAB'
     ];
     protected $guarded = [
     ];
}
