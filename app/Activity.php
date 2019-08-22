<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $fillable = [
        'id_activity',
        'name_activity',
        'description_activity',
        'avatar_activity',
        ];
}
