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
            'title_news'    => ['required','max:1000','unique:news,title_news'],
            'detail_news'   => [ 'required','max:250000'],
            'source_news'   => ['required', 'max:1000'],
        ];
        if($this->get('avatar_news'))
            $rules = array_merge($rules, ['avatar_news' => 'mimes:jpg,jpeg,png']);

        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'source_news.required'      => 'La fuente es obligatoria',
            'source_news.max'           => 'La fuente supera el tamaño permitido',
            'title_news.required'       => 'El titulo es obligatorio.',
            'title_news.unique'         => 'Ya existe una noticia con ese Titular.',
            'title_news.max'            => 'El titulo es demasiado extenso.',
            'detail_news.required'      => 'Escriba una descripción de la notitica.',
            'detail_news.max'           => 'El detalle de la noticia supera el tamaño permitido.',
        ];

        if($this->get('avatar_news'))
            $messages = array_merge($messages, ['avatar_news.mimes' => 'La imagen debe ser de formato: pg,jpeg ó png']);

        return $messages;
    }
}
