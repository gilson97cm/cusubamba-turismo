<?php

namespace App\Http\Controllers\User;

use App\Activity;
use App\ActivityCategories;
use App\Legend;
use App\News;
use App\PlaceCategories;
use App\Event;
use App\EventCategories;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $count = 0;
        $place_categories = PlaceCategories::orderBy('name_place_category', 'ASC')->get();
        $activity_categories = ActivityCategories::orderBy('name_activity_category', 'ASC')->get();
        $events = Event::orderBy('start_event', 'ASC')->where('end_event','>=',now())->get();
        $news = News::orderBy('created_at', 'DESC')->get();
        $places = Place:: orderBy('name_place', 'ASC')->get();
        $activities = Activity:: orderBy('name_activity', 'ASC')->get();
        $events_ = Event::orderBy('start_event', 'DESC')->get();
        $legends = Legend::orderBy('title_legend', 'ASC')->get();
        return view('backend.user.home.index',
            compact('place_categories', 'activity_categories','events','news','places','activities','events_','legends'));
    }
}
