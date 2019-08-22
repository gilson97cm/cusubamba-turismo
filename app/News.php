<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $timestamps = false;
    protected $fillable =[
        'name_news',
        'description_news',
        'date_news',
        'avatar_news',
    ];


}
