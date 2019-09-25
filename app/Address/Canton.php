<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Canton extends Model
{
    protected $table = 'canton';
    protected $fillable = [
        'name_canton',
        'name_province'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'name_province'); //foreing key es para no tener error al mostrar el nombre de la categoria en el index
    }

    public function parish()
    {
        return $this->hasMany(Parish::class);
    }

    public function scopeName_province($query, $name){
        if($name)
            return $query->where('name_province','LIKE', "%$name%");
    }
}
