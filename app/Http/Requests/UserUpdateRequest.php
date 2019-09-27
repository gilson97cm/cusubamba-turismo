<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'id_card_user' => 'required|max:10|min:10|unique:users,id_card_user,'.$this->user, //
            'name_user' => ['required','string','max:50'], //
            'last_name_user' => ['required','string','max:50'], //
            'birth_date_user' => ['required','before: 2000/01/01'], //
            'genre_user' => 'required', //
            'province_user' => 'required', //
            'canton_user' => 'required', //
            'parish_user' => 'required', //
            'address_user'=> ['required','max:50'], //
            'phone_user'=> ['required','max:10', 'min:10'],//
            'position_user' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user], //
           // 'password' => ['required', 'string', 'min:8', 'confirmed'], //
            //confirmar contraseña//
            'rol' => 'required',//
            'state_user' => 'required',//
        ];
        if($this->get('password'))
            $rules = array_merge($rules, ['password' => 'string', 'min:8', 'confirmed']);


        return $rules;
    }

    public function messages()
    {
        $messages = [
            'id_card_user.required' => 'La campo cédula es obligatorio',
            'id_card_user.max' => 'Cédula invalida',
            'id_card_user.min' => 'Cédula invalida',
            'id_card_user.unique' => 'El usuario ya esta registrado',
            'name_user.required' => 'El campo nombre es obligatorio.',
            'name_user.max' => 'El nombre no puede tener mas de 45 caracteres.',
            'last_name_user.required' => 'El campo apellido es obligatorio.',
            'birth_date_user.required' => 'El campo fecha es obligatorio',
            'birth_date_user.before' => 'No es mayor de edad',
            'genre_user.required' => 'Debe elegir un género',
            'province_user.required' => 'El campo Provincia es obligatorio',
            'canton_user.required' => 'El campo Cantón es obligatorio',
            'parish_user.required' => 'El campo Parroquia es obligatorio',
            'last_name_user.max' => 'El apellido no puede tener mas de 45 caracteres.',
            'address_user.required' => 'El campo dirección es obligatorio',
            'address_user.max' => 'La direccion no puede tener mas de 45 caracteres',
            'phone_user.required' => 'el campo telefono es onligatorio.',
            'phone_user.max' => 'El telefono debe tener de 10 digitos.',
            'phone_user.min' => 'El telefono debe tener de 10 digitos.',
            'email.required'  =>'El campo Correo es obligatorio.',
            'email.email' =>'El correo no es valido.',
            'email.max' =>'El correo no puede tener mas de 25 caracteres',
            'email.unique' =>'El Correo ya esta en uso, intente con otro',
           // 'password.required' => 'La contraseña es obligatoria.',
            //'password.min' => 'Contraseña demasiado corta.',
           // 'password.confirmed' => 'No se ha confirmado la contraseña.',
            'state_user.required' => 'El estado del usuario es necesario.',
            'position_user.required' => 'Es necesario registrar el cargo',
        ];

        if($this->get('password'))
            $messages = array_merge($messages, ['password.min' => 'Contraseña demasiado corta.']);
            $messages = array_merge($messages, ['password.confirmed' => 'No se ha confirmado la contraseña.']);

        return $messages;
    }
}
