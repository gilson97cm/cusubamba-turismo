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
    public function index(Request $request)
    {
        $date = $request->get('created_at');
        $title = $request->get('title_news');
        $detail = $request->get('detail_news');

        $news = News::orderBy('created_at', 'DESC')
            ->created_at($date)
            ->title($title)
            ->detail($detail)
            ->paginate(10);
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
        //return redirect()->route('news.index', $news->id);
        return back();
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
        if ($news)
            return view('backend.admin.news.show', compact('news'));
        else
            return redirect()->route('home');
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
        if ($news_)
            return view('backend.admin.news.edit', compact('news_'));
        else
            return redirect()->route('home');

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
            $news_->fill(['avatar_news' => $path])->save();
        }

        Flash::success('Noticia actualizada con exito!');
        //$activities = Activity::paginate(10);
        return redirect()->route('news.show', $news_->id);
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

