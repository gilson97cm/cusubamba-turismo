<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityCategories extends Model
{
    protected $table = 'activity_categories';
    protected $fillable = [
        'name_activity_category',
        'description_activity_category',
    ];

    //relation
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    //Scope
    public function scopeName($query, $name){
        if($name)
            return $query->where('name_activity_category','LIKE', "%$name%");
    }
    public function scopeDescription($query, $description){
        if($description)
            return $query->where('description_activity_category','LIKE', "%$description%");
    }
}
