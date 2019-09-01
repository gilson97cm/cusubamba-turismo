<?php

namespace App\Http\Controllers\Admin;

use App\Place;
use App\PlaceCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name_place');
        $description = $request->get('description_place');
        $category_id = $request->get('place_category_id');

        $categories = PlaceCategories::orderBy('name_place_category', 'ASC')->pluck('name_place_category', 'id');

        $places = Place::orderBy('name_place', 'ASC')
            ->name($name)
            ->description($description)
            ->place_category_id($category_id)
            ->paginate(10);
        return view('backend.admin.places.index', compact('places', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PlaceCategories::orderBy('name_place_category', 'ASC')->pluck('name_place_category', 'id');
        return view('backend.admin.places.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $place = Place::create($request->all());
        //image
        if ($request->file('avatar_place')) {
            $path = Storage::disk('public')->put('temp/avatar_places', $request->file('avatar_place'));
            $place->fill(['avatar_place' => $path])->save();
        } else {
            $place->fill(['avatar_place' => 'assets/images/sin_img.jpg'])->save();
        }
        Flash::success('Lugar: ' . $place->name_place . " publicado con exito!");
        // return redirect()->route('places.edit', $places->id);
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
        $place = Place::find($id);
        if ($place)
            return view('backend.admin.places.show', compact('place'));
        else
            return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = PlaceCategories::orderBy('name_place_category', 'ASC')->pluck('name_place_category', 'id');
        $place = Place::find($id);
        if ($place)
            return view('backend.admin.places.edit', compact('place', 'categories'));
        else
            return redirect()->route('home');
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
        $place = Place::find($id);
        $place->fill($request->all())->save();

        //image
        if ($request->file('avatar_place')) {
            $path = Storage::disk('public')->put('temp\avatar_places', $request->file('avatar_place'));
            $place->fill(['avatar_place' => asset($path)])->save();
        }

        Flash::success('Lugar actualizado con exito!');
        //$places = places::paginate(10);
        return redirect()->route('places.show', $place->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Place $place)
    {
        if ($request->ajax()) {
            $place->delete();
            return response()->json([
                'message' => 'Lugar eliminado con exito.',
            ]);
        }
    }
}
