<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $table = 'canton';
    protected $fillable = [
        'name_canton',
        'name_province'
    ];
}
