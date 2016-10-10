<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class TareaForm extends Request
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
            'nombreTarea'=>'required',
            'tareaCiclica'=>'required',
            'autor'=>'required',
            'tipoResponsable'=>'required',
            'observador'=>'required'
        ];
    }
}
