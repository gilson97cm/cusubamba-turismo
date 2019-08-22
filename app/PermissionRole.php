<?php

namespace App;

use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    protected $fillable = [
        'role_id',
        'permission_id'
    ];

    public function permissions(){
       return $this->hasMany(Permission::class);
    }
    public function roles(){
        return $this->hasMany(Role::class);
    }
}
