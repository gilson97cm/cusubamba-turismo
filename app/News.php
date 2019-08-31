<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    //protected $primaryKey = 'id_news';
    protected $fillable =[
      //  'id_news',
        'title_news',
        'detail_news',
        'source_news',
        'avatar_news',
    ];

    //Scope
    public function scopeCreated_at($query, $date){
        if($date)
            return $query->where('created_at','LIKE', "%$date%");
    }
    public function scopeTitle($query, $title){
        if($title)
            return $query->where('title_news','LIKE', "%$title%");
    }
    public function scopeDetail($query, $detail){
        if($detail)
            return $query->where('detail_news','LIKE', "%$detail%");
    }


}
