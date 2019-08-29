<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegendStoreRequest extends FormRequest
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
            'title_legend' => ['required','max:1000','unique:legends,title_legend'],
            'description_legend' => [ 'required','max:250000'],
        ];
        if($this->get('avatar_legend'))
            $rules = array_merge($rules, ['avatar_legend' => 'mimes:jpg,jpeg,png']);

        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'title_legend.required' => 'El titulo es obligatorio.',
            'title_legend.unique' => 'Ya existe una leyenda con ese Titulo.',
            'title_legend.max' => 'El titulo es demasiado extenso.',
            'description_legend.required' => 'Escriba una descripción de la leyenda.',
            'description_legend.max' => 'La descripcion de la leyenda supera el tamaño permitido.'
        ];

        if($this->get('avatar_legend'))
            $messages = array_merge($messages, ['avatar_legend.mimes' => 'La imagen debe ser de formato: pg,jpeg ó png']);

        return $messages;
    }
}
