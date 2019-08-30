<?php

namespace App\Http\Controllers\Admin;

use App\EventCategories;
use App\Http\Requests\EventCategoriesStoreRequest;
use App\Http\Requests\EventCategoriesUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class EventCategoriesController extends Controller
{
    public function index()
    {
        $categories = EventCategories::orderBy('id', 'DESC')
            ->paginate(8);
        return view('backend.admin.categories.events.index', compact('categories'));
    }

    public function store(EventCategoriesStoreRequest $request)
    {
        $category = EventCategories::create($request->all());
        Flash::success('Categoría '.$category->name_event_category." agregado con exito!");
        return back();
    }

    public function update(EventCategoriesUpdateRequest $request, $id)
    {
        $category = EventCategories::find($id);
        $category->fill($request->all())->save();
        Flash::success('Categoría '.$category->name_event_category." actualizada con exito!");
        return back();
    }

    public function destroy(Request $request, EventCategories $category)
    {
        // dd($category);
        if ($request->ajax()){
            $category->delete();
            return response()->json([
                'message' => 'La categoría '.$category->name_event_category. ' fue eliminada con exito.',
            ]);
        }
    }


    public function search(Request $request){

        //  dd($request->name_category_activity);

        $name = $request->get('name_event_category');
        $description = $request->get('description_event_category');

        $categories = EventCategories::orderBy('id','DESC')
            ->name($name)
            ->description($description)
            ->paginate(8);

        return view('backend.admin.categories.events.index', compact('categories'));

    }
}
