<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceCategories extends Model
{
    protected $table = 'place_categories';
    protected $fillable = [
        'name_place_category',
        'description_place_category',
    ];

    public function places(){
        return $this->hasMany(Place::class);
    }

    //Scope
    public function scopeName($query, $name){
        if($name)
            return $query->where('name_place_category','LIKE', "%$name%");
    }
    public function scopeDescription($query, $description){
        if($description)
            return $query->where('description_place_category','LIKE', "%$description%");
    }
}
