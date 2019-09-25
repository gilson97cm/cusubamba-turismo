<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parish extends Model
{
    protected $table = 'parish';
    protected $fillable = [
        'name_parish',
        'name_canton'
    ];

    public function canton()
    {
        return $this->belongsTo(Canton::class, 'name_canton'); //foreing key es para no tener error al mostrar el nombre de la categoria en el index
    }

    public function scopeName_canton($query, $name){
        if($name)
            return $query->where('name_canton','LIKE', "%$name%");
    }

}
