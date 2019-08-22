<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    public $primaryKey = 'id_person';
    protected $fillable = [
        'id_card_person',
        'name_person',
        'last_name_person',
        'birthdate_person',
        'province_person',
        'canton_person',
        'parish_person',
        'address_person',
        'phone_person',
        'genre_person',
        'position_person',
    ];
    //RELACIONES
    public function blind_people(){
        return $this->hasOne(BlindPerson::class);
    }
    public function users(){
        return $this->hasOne(User::class);
    }
}
