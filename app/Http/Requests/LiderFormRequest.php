<?php

namespace CivilOption\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiderFormRequest extends FormRequest
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
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'cedula'=>'required|numeric',
            'direccion'=>'max:50',
            'telefono'=>'max:50',
            'id_coordinador'=>'required',
        ];
    }
}
