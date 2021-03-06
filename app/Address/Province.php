<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $fillable = [
        'name_province',
    ];

    public function canton()
    {
        return $this->hasMany(Canton::class);
    }
}
