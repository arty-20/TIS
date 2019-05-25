<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuxiliarFormRequest extends FormRequest
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
            'CONTRASENIA'=>'required|max:20',
            'EMAIL'=>'required|max:50',
            'NOMBRE_AUXILIAR'=>'required|max:30',
            'APELLIDO_AUXILIAR'=>'required|max:30',
            'CODIGO_SIS'=>'required|max:15',
        ];
    }
}
