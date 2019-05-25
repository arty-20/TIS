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
            'NOMBRE_ESTUDIANTE'=>'required',
            'APELLIDO_ESTUDIANTE'=>'required',
            'CODIGO_SIS'=>'required | numeric | min:9',
            'EMAIL'=>'email | required',
            'CONTRASENIA'=>'required | confirmed'
        ];
    }
    public function messages(){
        return[
            'CODIGO_SIS.numeric'=>'El :attribute debe ser numerico',
            'CODIGO_SIS.min'=>'El :attribute debe tener 9 digitos minimo'
        ];
    }
}
