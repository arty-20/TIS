<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioFormRequest extends FormRequest
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
            'ID_LABORATORIO'=>'required|numeric|max:11',
            'ID_DIA'=>'required|numeric|max:11',
            'ID_HORA'=>'required|numeric|max:11',
            'DISPONIBLE'=>'numeric|max:1'
        ];
    }
}
