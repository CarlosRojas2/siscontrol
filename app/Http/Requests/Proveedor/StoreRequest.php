<?php

namespace App\Http\Requests\Proveedor;

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
            'nombre'=>'required|string|max:60',
            'email'=>'required|email|string|max:60|unique:proveedors',
            'numero_ruc'=>'required|string|max:11|min:11|unique:proveedors',
            'direccion'=>'nullable|string|max:60',
            'telefono'=>'required|string|max:9|min:9|unique:proveedors',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.max'=>'El nombre Solo permite 60 caracteres.',


            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electrónico.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'EL email solo permite 60 caracteres.',
            'email.unique'=>'Este email ya se encuentra registrado.',



            'numero_ruc.required'=>'Este campo es requerido.',
            'numero_ruc.string'=>'El valor no es correcto.',
            'numero_ruc.max'=>'El RUC requiere de 11 caracteres.',
            'numero_ruc.min'=>'El RUC requiere de 11 caracteres.',
            'numero_ruc.unique'=>'Este RUC ya se encuentra registrado.',


            'direccion.string'=>'El valor no es correcto.',
            'direccion.max'=>'La dirección Solo permite 60 caracteres.',


            'telefono.required'=>'Este campo es requerido.',
            'telefono.string'=>'El valor no es correcto.',
            'telefono.max'=>'El telefono solo permite 9 caracteres.',
            'telefono.min'=>'El telefono requiere de 9 caracteres.',
            'telefono.unique'=>'Este número de telefono ya se encuentra registrado.',
        ];
    }
}