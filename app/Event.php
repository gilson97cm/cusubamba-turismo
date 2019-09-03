<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'name_event',
        'description_event',
        'start_event',
        'end_event',
        'all_day_event',
        'color_event',
        'avatar_event',
        'event_category_id',
    ];
}
