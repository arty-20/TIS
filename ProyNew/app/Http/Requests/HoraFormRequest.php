<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoraFormRequest extends FormRequest
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
            'HORA_INICIO'=>'required|time',
            'HORA_FIN'=>'required|time'
        ];
    }
}
