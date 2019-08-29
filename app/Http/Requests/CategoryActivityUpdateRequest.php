<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryActivityUpdateRequest extends FormRequest
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
            'name_category_activity' => ['required','max:100','unique:category_activities,name_category_activity,'.$this->category],
            'description_category_activity' => [ 'required','max:1000'],
        ];
        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'name_category_activity.required' => 'El nombre es obligatorio.',
            'name_category_activity.unique' => 'Ya existe una categoria con ese nombre.',
            'name_category_activity.max' => 'El nombre es demasiado extenso.',
            'description_category_activity.required' => 'Escriba una breve descripción de la categoria.',
            'description_category_activity.max' => 'La descripcion de la categoria supera el tamaño permitido.'
        ];
        return $messages;
    }
}
