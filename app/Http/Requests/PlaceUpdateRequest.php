<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceUpdateRequest extends FormRequest
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
            'name_place'          => ['required','max:1000','unique:places,name_place,'.$this->place],
            'description_place'    => [ 'required','max:250000'],
            'place_categories_id'    => ['required'],
        ];
        if($this->get('avatar_place'))
            $rules = array_merge($rules, ['avatar_place' => 'mimes:jpg,jpeg,png']);

        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'name_place.required'              => 'El nombre es obligatorio.',
            'name_place.unique'                => 'Ya existe un lugar con ese nombre.',
            'name_place.max'                   => 'El nombre es demasiado extenso.',
            'description_place.required'       => 'Escriba una descripción del lugar.',
            'description_place.max'            => 'La descripcion del lugar supera el tamaño permitido.',
            'place_categories_id.required'       => 'Debe elegir una categoría',
        ];

        if($this->get('avatar_place'))
            $messages = array_merge($messages, ['avatar_place.mimes' => 'La imagen debe ser de formato: pg,jpeg ó png']);

        return $messages;
    }
}
