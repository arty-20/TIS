<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'CONTRASENIA'=>'required_with:CONTRASENIA_CONFIRMATION|same:CONTRASENIA_CONFIRMATION|string|max:20',
            'CONTRASENIA_CONFIRMATION'=>'max:20|string',
            'EMAIL'=>'required|string|email|max:50|unique:docente',
            'NOMBRE_ESTUDIANTE'=>'required|string|max:30',
            'APELLIDO_ESTUDIANTE'=>'required|string|max:30',
            'CODIGO_SIS'=>'required|numeric|digits_between:8,15'    
        ];
    }
}
