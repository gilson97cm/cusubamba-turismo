<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'unique:roles,name'],
            'slug' => ['required', 'unique:roles,slug'],
            'description' => 'max:250',
            'special' => 'nullable',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Debe asignar un nombre al Rol.',
            'name.unique' => 'El Rol ya existe.',
            'slug.required' => 'Debe asignar una URL amigable al Rol.',
            'slug.unique' => 'La ruta ya está en uso, ingrese una ruta diferente.',
            'description.max' => 'La descripción debe ser breve y clara.',
        ];
        return $messages;
    }
}
