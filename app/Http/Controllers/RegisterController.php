<?php

namespace App\Http\Controllers;

use App\Address\Province;
use App\Person;
use App\RoleUser;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class RegisterController extends Controller
{

    use RegistersUsers;
    public function showRegistrationForm()
    {
        $provinces = DB::table('province')->pluck('name_province', 'name_province');
      // $provinces = json_encode($p);
        // dd($provinces);
        return view('backend.admin.auth.register',compact('provinces'));
    }

    protected $redirectTo ='deals/create'; //redireccionaar al formulario de registro del negocio

    /**
     * Create a news controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
            return \Illuminate\Support\Facades\Validator::make($data, [
                'cedula' => 'required|max:10|min:10|unique:people,id_card_person',
                'nombre' => ['required','string','max:50'],
                'apellido' => ['required','string','max:50'],
                'fecha' => ['required','before: 2000/01/01', 'After: 1940/01/01'],
                'telefono'=> ['required','max:10', 'min:10'],
                'genre_person' => 'required',
                'province_person' => 'required',
                'canton_person' => 'required',
                'parish_person' => 'required',
                'direccion'=> ['required','max:50'],
                //  'persona_id_persona' => ['required', 'integer', 'max:255'],
                //'rol_id_rol' => ['required', 'integer', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],[
                'cedula.required' => 'La campo cédula es obligatorio',
                'cedula.max' => 'Cédula invalida',
                'cedula.min' => 'Cédula invalida',
                'cedula.unique' => 'El usuario ya esta registrado',
                'nombre.required' => 'El campo nombre es obligatorio.',
                'nombre.max' => 'El nombre no puede tener mas de 45 caracteres.',
                'apellido.required' => 'El campo apellido es obligatorio.',
                'fecha.required' => 'El campo fecha es obligatorio',
                'fecha.before' => 'No es mayor de edad',
                'fecha.after' => 'El usuario no debe tener mas de 79 años',
                'genre_person.required' => 'Debe elegir un género',
                'province_person.required' => 'El campo Provincia es obligatorio',
                'canton_person.required' => 'El campo Cantón es obligatorio',
                'parish_person.required' => 'El campo Parroquia es obligatorio',
                'apellido.max' => 'El apellido no puede tener mas de 45 caracteres.',
                'direccion.required' => 'El campo dirección es obligatorio',
                'direccion.max' => 'La direccion no puede tener mas de 45 caracteres',
                'telefono.required' => 'el campo telefono es onligatorio.',
                'telefono.max' => 'El telefono debe tener de 10 digitos.',
                'telefono.min' => 'El telefono debe tener de 10 digitos.',
                'email.required'  =>'El campo Correo es obligatorio.',
                'email.email' =>'El correo no es valido.',
                'email.max' =>'El correo no puede tener mas de 25 caracteres',
                'email.unique' =>'El Correo ya esta en uso, intente con otro',
                'password.required' => 'LA contraseña es obligatoria.',
                'password.min' => 'Contraseña demasiado corta.',
                'password.confirmed' => 'No se ha confirmado la contraseña.',
            ]);
    }


    /**
     * Create a news user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            //dd($data);
            $persona = Person::create([
                //  'id_persona' => $data['id'],
                'id_card_person' => $data['cedula'],
                'name_person' => $data['nombre'],
                'last_name_person' => $data['apellido'],
                'birthdate_person' => $data['fecha'],
                'province_person' => $data['province_person'],
                'canton_person' => $data['canton_person'],
                'parish_person' => $data['parish_person'],
                'address_person' => $data['direccion'],
                'phone_person' => $data['telefono'],
                'genre_person' => $data['genre_person'],
            ]);
            $user = User::create([
                'person_id_card' => $data['cedula'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $role = RoleUser::create([
                'role_id' => 2,
                'user_id' => $user->id,
            ]);
            return $user;

    }


}
