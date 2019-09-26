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
    public function roles() :BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
