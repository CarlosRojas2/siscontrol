<?php

namespace App\Http\Requests\Producto;

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
            'nombre'=>'string|required|unique:productos|max:255',
            'categoria_id'=>'integer|required|exists:App\Models\Categoria,id',
        ];
    }
    public function messages()
    {
        return [
            'nombre.string'=>'el valor no es correcto.',
            'nombre.required'=>'El campo es requerido.',
            'nombre.unique'=>'El producto ya esta registrado.',
            'nombre.max'=>'Solo se permite 255 caracteres.',

            'categoria_id.integer'=>'El valor tiene que ser entero.',
            'categoria_id.required'=>'El campo es requerido.',
            'categoria_id.exists'=>'La categoría no existe.'
        ];
    }
}
