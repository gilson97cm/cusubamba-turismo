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
}
