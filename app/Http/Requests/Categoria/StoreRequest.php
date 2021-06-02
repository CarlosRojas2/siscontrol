<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nombre'=>'required|string|max:120|unique:categorias',
            'descripcion'=>'nullable|string|max:120'
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=>'Este campo es requerido.',
            'nombre.unique'=>'Ya existe una categoria con este nombre.',
            'nombre.string'=>'el valor no es correcto.',
            'nombre.max'=>'Solo se permite 120 caracteres.',

            'descripcion.string'=>'el valor no es correcto.',
            'descripcion.max'=>'Solo se permite 120 caracteres.'

        ];
    }
}
