<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
           'id_card_person' => 'required|max:10|min:10|unique:people,id_card_person', //
           'name_person' => ['required','string','max:50'], //
           'last_name_person' => ['required','string','max:50'], //
           'birthdate_person' => ['required','before: 2000/01/01'], //
           'genre_person' => 'required', //
           'province_person' => 'required', //
           'canton_person' => 'required', //
           'parish_person' => 'required', //
           'address_person'=> ['required','max:50'], //
           'phone_person'=> ['required','max:10', 'min:10'],//
           'position_person' => 'required',
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], //
           'password' => ['required', 'string', 'min:8', 'confirmed'], //
           //confirmar contraseña//
           'rol' => 'required',//
           'state_user' => 'required',//
       ];

       return $rules;
    }

    public function messages()
    {
        $messages = [
            'id_card_person.required' => 'La campo cédula es obligatorio',
            'id_card_person.max' => 'Cédula invalida',
            'id_card_person.min' => 'Cédula invalida',
            'id_card_person.unique' => 'El usuario ya esta registrado',
            'name_person.required' => 'El campo nombre es obligatorio.',
            'name_person.max' => 'El nombre no puede tener mas de 45 caracteres.',
            'last_name_person.required' => 'El campo apellido es obligatorio.',
            'birthdate_person.required' => 'El campo fecha es obligatorio',
            'birthdate_person.before' => 'No es mayor de edad',
            'genre_person.required' => 'Debe elegir un género',
            'province_person.required' => 'El campo Provincia es obligatorio',
            'canton_person.required' => 'El campo Cantón es obligatorio',
            'parish_person.required' => 'El campo Parroquia es obligatorio',
            'last_name_person.max' => 'El apellido no puede tener mas de 45 caracteres.',
            'address_person.required' => 'El campo dirección es obligatorio',
            'address_person.max' => 'La direccion no puede tener mas de 45 caracteres',
            'phone_person.required' => 'el campo telefono es onligatorio.',
            'phone_person.max' => 'El telefono debe tener de 10 digitos.',
            'phone_person.min' => 'El telefono debe tener de 10 digitos.',
            'email.required'  =>'El campo Correo es obligatorio.',
            'email.email' =>'El correo no es valido.',
            'email.max' =>'El correo no puede tener mas de 25 caracteres',
            'email.unique' =>'El Correo ya esta en uso, intente con otro',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'Contraseña demasiado corta.',
            'password.confirmed' => 'No se ha confirmado la contraseña.',
            'state_user.required' => 'El estado del usuario es necesario.',
            'position_person.required' => 'Es necesario registrar el cargo',
        ];
        return $messages;
    }
}
