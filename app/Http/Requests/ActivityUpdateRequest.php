<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityUpdateRequest extends FormRequest
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
            'name_activity'          => ['required','max:1000','unique:activities,name_activity,'.$this->activity],
            'description_activity'    => [ 'required','max:250000'],
            'activity_category_id'    => ['required'],
        ];
        if($this->get('avatar_activity'))
            $rules = array_merge($rules, ['avatar_activity' => 'mimes:jpg,jpeg,png']);

        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'name_activity.required'              => 'El nombre es obligatorio.',
            'name_activity.unique'                => 'Ya existe una actividad con ese nombre.',
            'name_activity.max'                   => 'El nombre es demasiado extenso.',
            'description_activity.required'       => 'Escriba una descripción de la actividad.',
            'description_activity.max'            => 'La descripcion de la actividad supera el tamaño permitido.',
            'activity_category_id.required'       => 'Debe elegir una categoría',
        ];

        if($this->get('avatar_activity'))
            $messages = array_merge($messages, ['avatar_activity.mimes' => 'La imagen debe ser de formato: pg,jpeg ó png']);

        return $messages;
    }
}
