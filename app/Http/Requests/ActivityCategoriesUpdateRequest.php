<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityCategoriesUpdateRequest extends FormRequest
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
            'name_activity_category' => ['required','max:100','unique:activity_categories,name_activity_category,'.$this->category],
            'description_activity_category' => [ 'required','max:120'],
        ];
        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'name_activity_category.required' => 'El nombre es obligatorio.',
            'name_activity_category.unique' => 'Ya existe una categoria con ese nombre.',
            'name_activity_category.max' => 'El nombre es demasiado extenso.',
            'description_activity_category.required' => 'Escriba una breve descripción de la categoria.',
            'description_activity_category.max' => 'La descripcion de la categoria supera el tamaño permitido.'
        ];
        return $messages;
    }
}
