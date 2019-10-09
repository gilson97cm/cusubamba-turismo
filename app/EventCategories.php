<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategories extends Model
{
    protected $table = 'event_categories';
    protected $fillable = [
        'name_event_category',
        'description_event_category',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    //Scope
    public function scopeName($query, $name){
        if($name)
            return $query->where('name_event_category','LIKE', "%$name%");
    }
    public function scopeDescription($query, $description){
        if($description)
            return $query->where('description_event_category','LIKE', "%$description%");
    }
}
