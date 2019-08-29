<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LegendStoreRequest;
use App\Http\Requests\LegendUpdateRequest;
use App\Legend;
use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class LegendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legends = Legend::orderBy('title_legend', 'ASC')->paginate(10);
        return view('backend.admin.legends.index', compact('legends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.legends.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LegendStoreRequest $request)
    {
        $legend = Legend::create($request->all());
        //image
        if ($request->file('avatar_legend')) {
            $path = Storage::disk('public')->put('temp/avatar_legends', $request->file('avatar_legend'));
            $legend->fill(['avatar_legend' => $path])->save();
        } else {
            $legend->fill(['avatar_legend' => 'assets/images/sin_img.jpg'])->save();
        }
        Flash::success('LEYENDA: ' . $legend->title_news . " publicada con exito!");
       // return redirect()->route('legends.edit', $legend->id);
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
        $legend = Legend::find($id);
        if ($legend)
            return view('backend.admin.legends.show', compact('legend'));
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
        $legend = Legend::find($id);
        if ($legend)
            return view('backend.admin.legends.edit', compact('legend'));
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
    public function update(LegendUpdateRequest $request, $id)
    {
        $legend = Legend::find($id);
        $legend->fill($request->all())->save();

        //image
        if ($request->file('avatar_legend')) {
            $path = Storage::disk('public')->put('temp\avatar_legends', $request->file('avatar_legend'));
            $legend->fill(['avatar_legend' => asset($path)])->save();
        }

        Flash::success('Leyenda actualizada con exito!');
        //$activities = Activity::paginate(10);
        return redirect()->route('legends.show', $legend->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Legend $legends)
    {
        //dd($legends);
        if ($request->ajax()) {
            $legends->delete();
            return response()->json([
                'message' => 'Leyenda eliminada con exito.',
            ]);
        }
    }
}
