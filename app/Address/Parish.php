<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parish extends Model
{
    protected $table = 'parish';
    protected $fillable = [
        'name_parish',
        'canton_id'
    ];

    public function canton()
    {
        return $this->belongsTo(Canton::class, 'canton_id'); //foreing key es para no tener error al mostrar el nombre de la categoria en el index
    }

    public function scopeCanton_id($query, $id){
        if($id)
            return $query->where('canton_id','LIKE', "%$id%");
    }

}
