<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = [
        'name_activity',
        'description_activity',
        'avatar_activity',
        'activity_category_id',
        ];
    //relation
    public function category()
    {
        return $this->belongsTo(ActivityCategories::class, 'activity_category_id'); //foreing key es para no tener error al mostrar el nombre de la categoria en el index
    }
    public function places()
    {
        return $this->belongsToMany(Place::class)->withTimestamps();
    }
    //scope
    public function scopeActivity_category_id($query, $id){
        if($id)
            return $query->where('activity_category_id','LIKE', "%$id%");
    }
    public function scopeName($query, $name){
        if($name)
            return $query->where('name_activity','LIKE', "%$name%");
    }
    public function scopeDescription($query, $description){
        if($description)
            return $query->where('description_activity','LIKE', "%$description%");
    }
}
