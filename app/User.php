<?php

namespace App;

use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_card_user',
        'name_user',
        'last_name_user',
        'birth_date_user',
        'phone_user',
        'genre_user',
        'position_user',

        'province_user',
        'canton_user',
        'parish_user',
        'address_user',

        'email',
        'password',
        'state_user',
        'avatar_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //RELACIONES
    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    //scope
    public function scopeId_card_user($query, $id){
        if($id)
            return $query->where('id_card_user','LIKE', "%$id%");
    }
    public function scopeName_user($query, $name){
        if($name)
            return $query->where('name_user','LIKE', "%$name%");
    }
    public function scopeLast_name_user($query, $last_name){
        if($last_name)
            return $query->where('last_name_user','LIKE', "%$last_name%");
    }
    public function scopeEmail($query, $email){
        if($email)
            return $query->where('email','LIKE', "%$email%");
    }

    public function scopePosition_user($query, $position){
        if($position)
            return $query->where('position_user','LIKE', "%$position%");
    }

}
