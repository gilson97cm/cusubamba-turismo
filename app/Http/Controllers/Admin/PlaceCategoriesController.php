<?php

namespace App\Http\Controllers\Admin;

use App\PlaceCategories;
use App\Http\Requests\PlaceCategoriesStoreRequest;
use App\Http\Requests\PlaceCategoriesUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class PlaceCategoriesController extends Controller
{
    public function index()
    {
        $categories = PlaceCategories::orderBy('id', 'DESC')
            ->paginate(8);
        return view('backend.admin.categories.places.index', compact('categories'));
    }

    public function store(PlaceCategoriesStoreRequest $request)
    {
        $category = PlaceCategories::create($request->all());
        Flash::success('Categoría '.$category->name_place_category." agregado con exito!");
        return back();
    }

    public function update(PlaceCategoriesUpdateRequest $request, $id)
    {
        $category = PlaceCategories::find($id);
        $category->fill($request->all())->save();
        Flash::success('Categoría '.$category->name_place_category." actualizada con exito!");
        return back();
    }

    public function destroy(Request $request, PlaceCategories $category)
    {
        // dd($category);
        if ($request->ajax()){
            $category->delete();
            return response()->json([
                'message' => 'La categoría '.$category->name_place_category. ' fue eliminada con exito.',
            ]);
        }
    }


    public function search(Request $request){


        $name = $request->get('name_place_category');
        $description = $request->get('description_place_category');

        $categories = PlaceCategories::orderBy('id','DESC')
            ->name($name)
            ->description($description)
            ->paginate(8);

        return view('backend.admin.categories.places.index', compact('categories'));

    }
}
