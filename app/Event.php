<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'id',
        'name_event',
        'description_event',
        'location_event',
        'start_event',
        'end_event',
        'all_day_event',
        'color_event',
        'avatar_event',
        'event_categories_id',
    ];

    public function category()
    {
        return $this->belongsTo(EventCategories::class, 'event_categories_id'); //foreing key es para no tener error al mostrar el nombre de la categoria en el index
    }

    //scope
    public function scopeStart_event($query, $date){
        if($date)
            return $query->where('start_event','LIKE', "%$date%");
    }
    public function scopeEnd_event($query, $date){
        if($date)
            return $query->where('end_event','LIKE', "%$date%");
    }
    public function scopeName($query, $name){
        if($name)
            return $query->where('name_event','LIKE', "%$name%");
    }
    public function scopeDescription($query, $description){
        if($description)
            return $query->where('description_event','LIKE', "%$description%");
    }
    public function scopeEvent_categories_id($query, $id){
        if($id)
            return $query->where('event_categories_id','LIKE', "%$id%");
    }
}
