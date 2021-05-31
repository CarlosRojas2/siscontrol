<?php

namespace App\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nombre'=>'required|string|max:255',

            'email'=>'required|email|string|unique:proveedors,email,' . $this->route('proveedor')->id.'|max:255',

            'numero_ruc'=>'required|string|min:11|unique:proveedors,numero_ruc,'. $this->route('proveedor')->id.'|max:255',

            'direccion'=>'nullable|string|max:255',

            'telefono'=>'required|string|min:9|unique:proveedors,telefono,'. $this->route('proveedor')->id.'|max:9',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.max'=>'Solo se permite 50 caracteres.',


            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electrónico.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permite 255 caracteres.',
            'email.unique'=>'Ya se encuentra registrado.',



            'numero_ruc.required'=>'Este campo es requerido.',
            'numero_ruc.string'=>'El valor no es correcto.',
            'numero_ruc.max'=>'Solo se permite 50 caracteres.',
            'numero_ruc.min'=>'Se requiere de 11 caracteres.',
            'numero_ruc.unique'=>'Ya se encuentra registrado.',


            'direccion.string'=>'El valor no es correcto.',
            'direccion.max'=>'Solo se permite 255 caracteres.',


            'telefono.required'=>'Este campo es requerido.',
            'telefono.string'=>'El valor no es correcto.',
            'telefono.max'=>'Solo se permite 9 caracteres.',
            'telefono.min'=>'Se requiere de 9 caracteres.',
            'telefono.unique'=>'Ya se encuentra registrado.'
        ];
    }
}
