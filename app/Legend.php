<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legend extends Model
{
    protected $table = 'legends';
    //protected $primaryKey = 'id_legend';
    protected $fillable =[
        //  'id_legend',
        'title_legend',
        'description_legend',
        'avatar_legend',
    ];

    //scope
    public function scopeTitle($query, $title){
        if($title)
            return $query->where('title_legend','LIKE', "%$title%");
    }
    public function scopeDescription($query, $description){
        if($description)
            return $query->where('description_legend','LIKE', "%$description%");
    }
}
