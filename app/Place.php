<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $fillable = [
        'name_place',
        'description_place',
        'avatar_place',
        'place_categories_id',
    ];
    //relation
    public function category()
    {
        return $this->belongsTo(PlaceCategories::class, 'place_categories_id'); //foreing key es para no tener error al mostrar el nombre de la categoria en el index
    }
    public function activities()
    {
        return $this->belongsToMany(Activity::class)->withTimestamps();
    }
    //scope
    public function scopePlace_categories_id($query, $id){
        if($id)
            return $query->where('place_categories_id','LIKE', "%$id%");
    }
    public function scopeName($query, $name){
        if($name)
            return $query->where('name_place','LIKE', "%$name%");
    }
    public function scopeDescription($query, $description){
        if($description)
            return $query->where('description_place','LIKE', "%$description%");
    }
}
