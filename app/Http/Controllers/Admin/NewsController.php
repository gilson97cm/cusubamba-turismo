<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
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
        $news = News::orderBy('created_at', 'DESC')->paginate(10);
        return view('backend.admin.news.index', compact('news'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsStoreRequest $request)
    {
        $news = News::create($request->all());
        //image
       if ($request->file('avatar_news')) {
            $path = Storage::disk('public')->put('temp/avatar_news', $request->file('avatar_news'));
            $news->fill(['avatar_news' => $path])->save();
        } else {
            $news->fill(['avatar_news' => 'assets/images/sin_img.jpg'])->save();
        }
        Flash::success('NOTICIA: ' . $news->title_news . " publicada con exito!");
        return redirect()->route('news.edit', $news->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('backend.admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news_ = News::find($id);
        return view('backend.admin.news.edit', compact('news_'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $news_ = News::find($id);
        $news_->fill($request->all())->save();

        //image
        if ($request->file('avatar_news')) {
            $path = Storage::disk('public')->put('temp\avatar_news', $request->file('avatar_news'));
            $news_->fill(['avatar_news' => asset($path)])->save();
        }

        Flash::success('Noticia actualizada con exito!');
        //$activities = Activity::paginate(10);
        return redirect()->route('news.edit', $news_->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        if ($request->ajax()) {

            $news->delete();
            return response()->json([
                'message' => 'Noticia eliminada con exito.',
            ]);
        }
    }
}

