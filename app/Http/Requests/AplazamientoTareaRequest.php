<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class AplazamientoTareaRequest extends Request
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
           "nuevaFechaFinalTarea" => "required",
           "autor" => "required",
           "nombreAplazamiento" => "required",
           "descripcionAplazamiento" => "required",
           "fecha" => "required",
        ];
    }
}
