<?php

namespace App\Http\Controllers\Admin;

use App\CategoryActivity;
use App\Http\Requests\CategoryActivityStoreRequest;
use App\Http\Requests\CategoryActivityUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class CategoryActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryActivity::orderBy('id', 'DESC')
            ->paginate(8);
        return view('backend.admin.categories.activities.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryActivityStoreRequest $request)
    {
        $category = CategoryActivity::create($request->all());
        Flash::success('Categoría '.$category->name_category_activity." agregado con exito!");
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
    public function update(CategoryActivityUpdateRequest $request, $id)
    {
        $category = CategoryActivity::find($id);
        $category->fill($request->all())->save();
        Flash::success('Categoría '.$category->name_category_product." actualizada con exito!");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CategoryActivity $category)
    {
       // dd($category);
        if ($request->ajax()){
            $category->delete();
            return response()->json([
                'message' => 'La categoría '.$category->name_category_activity. ' fue eliminada con exito.',
            ]);
        }
    }
}
