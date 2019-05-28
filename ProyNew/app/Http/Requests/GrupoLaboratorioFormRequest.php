<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoLaboratorioFormRequest extends FormRequest
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
            'ID_DOC_MAT'=>'required|numeric|max:11',
            'ID_AUX'=>'required|numeric|max:11',
            'ID_HORARIO_LABORATORIO'=>'required|numeric|max:11',
            'CANTIDAD_ESTUDIANTES'=>'required|numeric|max:11',
            'ID_GESTION'=>'required|numeric|max:11'
        ];
    }
}
