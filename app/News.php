<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id_news';
    protected $fillable =[
        'title_news',
        'detail_news',
        'avatar_news',
    ];


}
