<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceCategoriesUpdateRequest extends FormRequest
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
            'name_place_category'           => ['required','max:100','unique:place_categories,name_place_category,'.$this->category],
            'description_place_category'    => [ 'required','max:120'],
        ];
        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'name_place_category.required'          => 'El nombre es obligatorio.',
            'name_place_category.unique'            => 'Ya existe una categoria con ese nombre.',
            'name_place_category.max'               => 'El nombre es demasiado extenso.',
            'description_place_category.required'   => 'Escriba una breve descripción de la categoria.',
            'description_place_category.max'        => 'La descripcion de la categoria supera el tamaño permitido.'
        ];
        return $messages;
    }
}
