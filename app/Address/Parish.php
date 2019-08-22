<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    protected $table = 'parish';
    protected $fillable = [
        'name_parish',
        'name_canton'
    ];
}
