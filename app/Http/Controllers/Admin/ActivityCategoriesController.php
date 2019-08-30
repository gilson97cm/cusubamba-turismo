<?php

namespace App\Http\Controllers\Admin;

use App\ActivityCategories;
use App\Http\Requests\ActivityCategoriesStoreRequest;
use App\Http\Requests\ActivityCategoriesUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class ActivityCategoriesController extends Controller
{
    public function index()
    {
        $categories = ActivityCategories::orderBy('id', 'DESC')
            ->paginate(8);
        return view('backend.admin.categories.activities.index', compact('categories'));
    }

    public function store(ActivityCategoriesStoreRequest $request)
    {
        $category = ActivityCategories::create($request->all());
        Flash::success('Categoría '.$category->name_activity_category." agregado con exito!");
        return back();
    }

    public function update(ActivityCategoriesUpdateRequest $request, $id)
    {
        $category = ActivityCategories::find($id);
        $category->fill($request->all())->save();
        Flash::success('Categoría '.$category->name_activity_category." actualizada con exito!");
        return back();
    }

    public function destroy(Request $request, ActivityCategories $category)
    {
        // dd($category);
        if ($request->ajax()){
            $category->delete();
            return response()->json([
                'message' => 'La categoría '.$category->name_activity_category. ' fue eliminada con exito.',
            ]);
        }
    }


    public function search(Request $request){

        //  dd($request->name_category_activity);

        $name = $request->get('name_activity_category');
        $description = $request->get('description_activity_category');

        $categories = ActivityCategories::orderBy('id','DESC')
            ->name($name)
            ->description($description)
            ->paginate(8);

        return view('backend.admin.categories.activities.index', compact('categories'));

    }
}
