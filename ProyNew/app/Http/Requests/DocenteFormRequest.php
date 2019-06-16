<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DocenteFormRequest extends FormRequest
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
        'CONTRASENIA'=>'required_with:CONTRASENIA_CONFIRMATION|same:CONTRASENIA_CONFIRMATION|string|max:191',
            'CONTRASENIA_CONFIRMATION'=>'max:191|string',
            'EMAIL'=>'required|string|email|max:50|unique:users',
            'NOMBRE_DOCENTE'=>'required|string|max:30',
            'APELLIDO_DOCENTE'=>'required|string|max:30',
            'TELEFONO'=>'numeric',
            'CODIGO_DOCENTE'=>'required|max:10'
        ];
    }
}
