<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.news.index');
    }

    /**
     * Show the form for creating a news resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_news' => ['required','unique:news,title_news'],
            'detail_news' => [ 'required', 'max:250'],
        ],[
            'title_news.required' => 'El titulo es obligatorio.',
            'title_news.unique' => 'Ya existe una noticia con ese Titular.',
            'detail_news.required' => 'Escriba una breve descripción de la notitica',
            'detail_news.max' => 'La descripcion no debe tener más de 250  caracteres.',
        ]);


        $news = News::create($request->all());
        //image
        if($request->file('avatar_news')){
            $path = Storage::disk('public')->put('temp/avatar_news', $request->file('avatar_news'));
            $news->fill(['avatar_news' => asset($path)])->save();
        }

        Flash::success('NOTICIA: '.$news->title_news." publicada con exito!");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
