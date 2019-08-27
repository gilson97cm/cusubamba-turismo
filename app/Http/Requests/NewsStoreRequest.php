<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class NewsStoreRequest extends FormRequest
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
            'title_news' => ['required','unique:news,title_news'],
            'detail_news' => [ 'required'],
        ];
        $messages = [
            'title_news.required' => 'El titulo es obligatorio.',
            'title_news.unique' => 'Ya existe una noticia con ese Titular.',
            'detail_news.required' => 'Escriba una breve descripción de la notitica',
        ];
        if($this->get('avatar_news'))
            $rules = array_merge($rules, ['avatar_news' => 'mimes:jpg,jpeg,png']);

        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'title_news.required' => 'El titulo es obligatorio.',
            'title_news.unique' => 'Ya existe una noticia con ese Titular.',
            'detail_news.required' => 'Escriba una breve descripción de la notitica',
        ];

        if($this->get('avatar_news'))
            $messages = array_merge($messages, ['avatar_news.mimes' => 'La imagen debe ser de formato: pg,jpeg ó png']);

        return $messages;
    }
}
