<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'id',
        'name_event',
        'description_event',
        'location_event',
        'start_event',
        'end_event',
        'all_day_event',
        'color_event',
        'avatar_event',
        'event_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(EventCategories::class, 'event_category_id'); //foreing key es para no tener error al mostrar el nombre de la categoria en el index
    }
}
