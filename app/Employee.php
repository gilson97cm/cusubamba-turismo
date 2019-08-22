<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;



class Employee extends Model
{
    public static function employee($id_employee, $deal){
        //$id_employee = numero de ceudla
        //$deal = ruc del negocio
        return UserDeal::query()
            ->join('deals', 'user_deal.deal_ruc','=', 'deals.ruc_deal')
            ->join('users', 'user_deal.user_id','=', 'users.id')
            ->join('role_user','role_user.user_id','=', 'users.id')
            ->join('roles','roles.id','=', 'role_user.role_id')
            ->join('people','id_card_person', '=', 'users.person_id_card')
            ->select(
                'people.id_card_person',
                'people.name_person',
                'people.last_name_person',
                'people.birthdate_person',
                'people.province_person',
                'people.canton_person',
                'people.parish_person',
                'people.address_person',
                'people.phone_person',
                'people.genre_person',
                'people.created_at',
                'users.email',
                'users.password',
                'users.state_user',
                'roles.id',
                'roles.name')
            ->where('deals.ruc_deal','=',$deal)
            ->where('people.id_card_person', '=', $id_employee)
            ->get();

        // dd($employee);
    }
}
