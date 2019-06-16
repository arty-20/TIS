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
            'CONTRASENIA'=>'confirmed|string|max:20',
            'EMAIL'=>'required|string|email|max:50|unique:users',
            'NOMBRE_ESTUDIANTE'=>'required|string|max:30',
            'APELLIDO_ESTUDIANTE'=>'required|string|max:30',
            'CODIGO_SIS'=>'required|numeric|digits_between:8,15'    
        ];
    }
}
