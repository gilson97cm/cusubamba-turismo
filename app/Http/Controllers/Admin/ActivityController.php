<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\ActivityCategories;
use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ActivityUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name_activity');
        $description = $request->get('description_activity');
        $category_id = $request->get('activity_categories_id');

        $categories = ActivityCategories::orderBy('name_activity_category', 'ASC')->pluck('name_activity_category', 'id');

        $activities = Activity::orderBy('name_activity', 'ASC')
            ->name($name)
            ->description($description)
            ->activity_categories_id($category_id)
            ->paginate(10);
        return view('backend.admin.activities.index', compact('activities', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ActivityCategories::orderBy('name_activity_category', 'ASC')->pluck('name_activity_category', 'id');
        return view('backend.admin.activities.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityStoreRequest $request)
    {
        $activity = Activity::create($request->all());
        //image
        if ($request->file('avatar_activity')) {
            $path = Storage::disk('public')->put('temp/avatar_activities', $request->file('avatar_activity'));
            $activity->fill(['avatar_activity' => $path])->save();
        } else {
            $activity->fill(['avatar_activity' => 'assets/images/sin_img.jpg'])->save();
        }
        Flash::success('ACTIVIDAD: ' . $activity->name_Activity . " publicada con exito!");
        // return redirect()->route('activities.edit', $activity->id);
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
        $activity = Activity::find($id);
        if ($activity)
            return view('backend.admin.activities.show', compact('activity'));
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
        $categories = ActivityCategories::orderBy('name_activity_category', 'ASC')->pluck('name_activity_category', 'id');
        $activity = Activity::find($id);
        if ($activity)
            return view('backend.admin.activities.edit', compact('activity', 'categories'));
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
    public function update(ActivityUpdateRequest $request, $id)
    {
        $activity = Activity::find($id);
        $activity->fill($request->all())->save();

        //image
        if ($request->file('avatar_activity')) {
            $path = Storage::disk('public')->put('temp\avatar_activities', $request->file('avatar_activity'));
            $activity->fill(['avatar_activity' => asset($path)])->save();
        }

        Flash::success('Actividad actualizada con exito!');
        //$activities = Activity::paginate(10);
        return redirect()->route('activities.show', $activity->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Activity $activity)
    {
        if ($request->ajax()) {
            $activity->delete();
            return response()->json([
                'message' => 'Actividad eliminada con exito.',
            ]);
        }
    }
}
