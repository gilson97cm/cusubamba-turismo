<?php

namespace App\Http\Controllers;

use App\Address\Province;
use App\Employee;
use App\Person;
use App\RoleUser;
use App\User;
use App\UserDeal;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;

class EmployeeController extends Controller
{
    public function index(){
        $people = Person::join('users','people.id_card_person', '=', 'users.person_id_card')
            ->join('role_user','role_user.user_id','=', 'users.id')
            ->join('roles','roles.id','=', 'role_user.role_id')
            ->select('*')
            ->where('users.state_user', '=', 'Activo')
        ->paginate(10);
      // dd($user_deal);
        return view('backend.admin.employee.index', compact('people'));
    }
    public function inactive(){
        $people = Person::join('users','people.id_card_person', '=', 'users.person_id_card')
            ->join('role_user','role_user.user_id','=', 'users.id')
            ->join('roles','roles.id','=', 'role_user.role_id')
            ->select('*')
            ->where('users.state_user', '=', 'Inactivo')
            ->paginate(10);
        // dd($user_deal);
        return view('backend.admin.employee.inactive', compact('people'));
    }
    public function create(){

        $roles = DB::table('roles')->pluck('name', 'id');
        $provinces = Province::pluck('name_province', 'id');
        return view('backend.admin.employee.create', compact('roles', 'provinces'));
    }

    public function store(Request $data){
       // dd($data);
        $data->validate([
            'id_card_person' => 'required|max:10|min:10|unique:people,id_card_person', //
            'name_person' => ['required','string','max:50'], //
            'last_name_person' => ['required','string','max:50'], //
            'birthdate_person' => ['required','before: 2000/01/01'], //
            'genre_person' => 'required', //
            'province_person' => 'required', //
            'canton_person' => 'required', //
            'parish_person' => 'required', //
            'address_person'=> ['required','max:50'], //
            'phone_person'=> ['required','max:10', 'min:10'],//
            'position_person' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], //
            'password' => ['required', 'string', 'min:8', 'confirmed'], //
            //confirmar contraseña//
            'rol' => 'required',//
            'state_user' => 'required',//

            ],[
            'id_card_person.required' => 'La campo cédula es obligatorio',
            'id_card_person.max' => 'Cédula invalida',
            'id_card_person.min' => 'Cédula invalida',
            'id_card_person.unique' => 'El usuario ya esta registrado',
            'name_person.required' => 'El campo nombre es obligatorio.',
            'name_person.max' => 'El nombre no puede tener mas de 45 caracteres.',
            'last_name_person.required' => 'El campo apellido es obligatorio.',
            'birthdate_person.required' => 'El campo fecha es obligatorio',
            'birthdate_person.before' => 'No es mayor de edad',
            'genre_person.required' => 'Debe elegir un género',
            'province_person.required' => 'El campo Provincia es obligatorio',
            'canton_person.required' => 'El campo Cantón es obligatorio',
            'parish_person.required' => 'El campo Parroquia es obligatorio',
            'last_name_person.max' => 'El apellido no puede tener mas de 45 caracteres.',
            'address_person.required' => 'El campo dirección es obligatorio',
            'address_person.max' => 'La direccion no puede tener mas de 45 caracteres',
            'phone_person.required' => 'el campo telefono es onligatorio.',
            'phone_person.max' => 'El telefono debe tener de 10 digitos.',
            'phone_person.min' => 'El telefono debe tener de 10 digitos.',
            'email.required'  =>'El campo Correo es obligatorio.',
            'email.email' =>'El correo no es valido.',
            'email.max' =>'El correo no puede tener mas de 25 caracteres',
            'email.unique' =>'El Correo ya esta en uso, intente con otro',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'Contraseña demasiado corta.',
            'password.confirmed' => 'No se ha confirmado la contraseña.',
            'state_user.required' => 'El estado del usuario es necesario.',
            'position_person.required' => 'Es necesario registrar el cargo',
        ]);

        //dd($data);
        $persona = Person::create([
            //  'id_persona' => $data['id'],
            'id_card_person' => $data['id_card_person'],
            'name_person' => $data['name_person'],
            'last_name_person' => $data['last_name_person'],
            'birthdate_person' => $data['birthdate_person'],
            'province_person' => $data['province_person'],
            'canton_person' => $data['canton_person'],
            'parish_person' => $data['parish_person'],
            'address_person' => $data['address_person'],
            'phone_person' => $data['phone_person'],
            'genre_person' => $data['genre_person'],
            'position_person' => $data['position_person'],
        ]);
        $user = User::create([
            'person_id_card' => $data['id_card_person'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $role = RoleUser::create([
            'role_id' => $data['rol'],
            'user_id' => $user->id,
        ]);

        Flash::success("Se registro a: ".$persona->name_person." ".$persona->last_name_person." con exito!");
        return back();
    }

    public function edit($id_employee)
    {
        $employee =Person::join('users','people.id_card_person', '=', 'users.person_id_card')
            ->join('role_user','role_user.user_id','=', 'users.id')
            ->join('roles','roles.id','=', 'role_user.role_id')
            ->select('*')
            ->where('id_card_person', '=', $id_employee)
            ->get();
        //dd($employee);
        $roles = DB::table('roles')->get();
        $provinces = DB::table('province')->get();
        return view('backend.admin.employee.edit', compact('employee', 'provinces', 'roles'));
    }

    public function update(Request $data, $id_employee)
    {
       /// dd($id_employee);
        #region VALIDATES
        if (!empty($data['password'])) {
            $data->validate([
                'id_card_person' => 'required|max:10|min:10', //
                'name_person' => ['required', 'string', 'max:50'], //
                'last_name_person' => ['required', 'string', 'max:50'], //
                'birthdate_person' => ['required', 'before: 2000/01/01'], //
                'genre_person' => 'required', //
                'province_person' => 'required', //
                'canton_person' => 'required', //
                'parish_person' => 'required', //
                'address_person' => ['required', 'max:50'], //
                'phone_person' => ['required', 'max:10', 'min:10'],//
                'email' => ['required', 'string', 'email', 'max:255'], //
                'password' => ['required', 'string', 'min:8', 'confirmed'], //
                //confirmar contraseña//
                'rol' => 'required',//
                'state_user' => 'required',//
                'position_person' => 'required',
            ], [
                'id_card_person.required' => 'La campo cédula es obligatorio',
                'id_card_person.max' => 'Cédula invalida',
                'id_card_person.min' => 'Cédula invalida',
                'name_person.required' => 'El campo nombre es obligatorio.',
                'name_person.max' => 'El nombre no puede tener mas de 45 caracteres.',
                'last_name_person.required' => 'El campo apellido es obligatorio.',
                'birthdate_person.required' => 'El campo fecha es obligatorio',
                'birthdate_person.before' => 'No es mayor de edad',
                'genre_person.required' => 'Debe elegir un género',
                'province_person.required' => 'El campo Provincia es obligatorio',
                'canton_person.required' => 'El campo Cantón es obligatorio',
                'parish_person.required' => 'El campo Parroquia es obligatorio',
                'last_name_person.max' => 'El apellido no puede tener mas de 45 caracteres.',
                'address_person.required' => 'El campo dirección es obligatorio',
                'address_person.max' => 'La direccion no puede tener mas de 45 caracteres',
                'phone_person.required' => 'el campo telefono es onligatorio.',
                'phone_person.max' => 'El telefono debe tener de 10 digitos.',
                'phone_person.min' => 'El telefono debe tener de 10 digitos.',
                'email.required' => 'El campo Correo es obligatorio.',
                'email.email' => 'El correo no es valido.',
                'email.max' => 'El correo no puede tener mas de 25 caracteres',
                'password.required' => 'La contraseña es obligatoria.',
                'password.min' => 'Contraseña demasiado corta.',
                'password.confirmed' => 'No se ha confirmado la contraseña.',
                'state_user.required' => 'El estado del usuario es necesario.',
                'position_person.required' => 'El cargo es obligatorio',
            ]);
            //echo 'pass bien';
        } else {
            $data->validate([
                'id_card_person' => 'required|max:10|min:10', //
                'name_person' => ['required', 'string', 'max:50'], //
                'last_name_person' => ['required', 'string', 'max:50'], //
                'birthdate_person' => ['required', 'before: 2000/01/01'], //
                'genre_person' => 'required', //
                'province_person' => 'required', //
                'canton_person' => 'required', //
                'parish_person' => 'required', //
                'address_person' => ['required', 'max:50'], //
                'phone_person' => ['required', 'max:10', 'min:10'],//
                'email' => ['required', 'string', 'email', 'max:255'], //
                // 'password' => ['required', 'string', 'min:8', 'confirmed'], //
                //confirmar contraseña//
                'rol' => 'required',//
                'state_user' => 'required',//
                'position_person' => 'required',
            ], [
                'id_card_person.required' => 'La campo cédula es obligatorio',
                'id_card_person.max' => 'Cédula invalida',
                'id_card_person.min' => 'Cédula invalida',
                'name_person.required' => 'El campo nombre es obligatorio.',
                'name_person.max' => 'El nombre no puede tener mas de 45 caracteres.',
                'last_name_person.required' => 'El campo apellido es obligatorio.',
                'birthdate_person.required' => 'El campo fecha es obligatorio',
                'birthdate_person.before' => 'No es mayor de edad',
                'genre_person.required' => 'Debe elegir un género',
                'province_person.required' => 'El campo Provincia es obligatorio',
                'canton_person.required' => 'El campo Cantón es obligatorio',
                'parish_person.required' => 'El campo Parroquia es obligatorio',
                'last_name_person.max' => 'El apellido no puede tener mas de 45 caracteres.',
                'address_person.required' => 'El campo dirección es obligatorio',
                'address_person.max' => 'La direccion no puede tener mas de 45 caracteres',
                'phone_person.required' => 'el campo telefono es onligatorio.',
                'phone_person.max' => 'El telefono debe tener de 10 digitos.',
                'phone_person.min' => 'El telefono debe tener de 10 digitos.',
                'email.required' => 'El campo Correo es obligatorio.',
                'email.email' => 'El correo no es valido.',
                'email.max' => 'El correo no puede tener mas de 25 caracteres',
                'password.required' => 'La contraseña es obligatoria.',
                //'password.min' => 'Contraseña demasiado corta.',
                //'password.confirmed' => 'No se ha confirmado la contraseña.',
                'state_user.required' => 'El estado del usuario es necesario.',
                'position_person.required' => 'El cargo es obligatorio',

            ]);
            // echo 'sin pas';
        }
        #endregion

        $employee = Person::find($id_employee);
            $employee->id_card_person = $data['id_card_person'];
            $employee->name_person = $data['name_person'];
            $employee->last_name_person = $data['last_name_person'];
            $employee->birthdate_person = $data['birthdate_person'];
            $employee->province_person = $data['province_person'];
            $employee->canton_person = $data['canton_person'];
            $employee->parish_person = $data['parish_person'];
            $employee->address_person = $data['address_person'];
            $employee->phone_person = $data['phone_person'];
            $employee->genre_person = $data['genre_person'];
            $employee->position_person = $data['position_person'];
            $employee->save();

        $u = User::query()
            ->where('person_id_card','=', $employee->id_card_person)->value('id');
        //dd($u);
        $user = User::find($u);
        $user->email = $data['email'];
        if(!empty($data['password'])){
            $user->password = bcrypt($data['password']);
        }
        $user->state_user = $data['state_user'];
        $user->save();
        $r = RoleUser::query()
            ->where('user_id', '=', $u)->value('id');
       // dd($r);
        $role = RoleUser::find($r);
        $role->role_id = $data['rol'];
        $role->user_id = $u;
        $role->save();

        Flash::success("Los datos de ".$employee->name_person." ".$employee->last_name_person." fueron actualizados con exito!");
        return redirect()->route('employees.index');

    }

    public function show($employee){
      //
        $employee = Person::join('users','people.id_card_person', '=', 'users.person_id_card')
            ->join('role_user','role_user.user_id','=', 'users.id')
            ->join('roles','roles.id','=', 'role_user.role_id')
            ->select('*')
            ->where('id_card_person', '=', $employee)
        ->get();
      // dd($employee);
        return view('backend.admin.employee.show', compact('employee'));
    }

    public function destroy(Request $request,Person $employee){

        if ($request->ajax()){
            $employee->delete();
            return response()->json([
                'message' => $employee->name_person. ' fue eliminado con exito.',
            ]);
        }
    }

}
