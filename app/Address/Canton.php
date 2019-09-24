<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Canton extends Model
{
    protected $table = 'canton';
    protected $fillable = [
        'id',
        'name_canton',
        'province_id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id'); //foreing key es para no tener error al mostrar el nombre de la categoria en el index
    }

    public function parish()
    {
        return $this->hasMany(Parish::class);
    }

    public function scopeProvince_id($query, $id){
        if($id)
            return $query->where('province_id','LIKE', "%$id%");
    }
}
