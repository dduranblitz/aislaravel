<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class SeguimientoTareaRequest extends Request
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
           "tarea" => "required",
           "autor" => "required",
           "nombreSeguimiento" => "required",
           "descripcionSeguimiento" => "required",
           "fecha" => "required",
        ];
    }
}
