<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
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
          'NameEdit' => 'required',
          'AppPaternoEdit' => 'required',
          'AppMaternoEdit'  => 'required',
          'UniversidadEdit'  => 'required',
          'FechaNacimientoEdit'  => 'required|date',
          'CarreraEdit'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'NameEdit.required' => 'El nombre es requerido.',
            'AppPaternoEdit.required'  => 'El Apellido Paterno es requerido.',
            'AppMaternoEdit.required'  => 'El Apellido Materno es requerido.',
            'UniversidadEdit.required'  => 'La Universidad es requerida.',
            'FechaNacimientoEdit.required'  => 'La Fecha de Nacimiento es requerido.',
            'FechaNacimientoEdit.date'  => 'No es una fecha valida.',
            'CarreraEdit.required'  => 'La Carrera es requerida.',
        ];
    }

}
