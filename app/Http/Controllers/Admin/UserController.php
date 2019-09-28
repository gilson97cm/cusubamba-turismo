<?php

namespace App\Http\Controllers\Admin;

use App\Address\Province;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\RoleUser;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_card = $request->get('id_card_user');
        $name = $request->get('name_user');
        $last_name = $request->get('last_name_user');
        $email = $request->get('email');
        $position = $request->get('position_user');

        $users = User::where('state_user', 'Activo')
            ->id_card_user($id_card)
            ->name_user($name)
            ->last_name_user($last_name)
            ->email($email)
            ->position_user($position)
            ->paginate(15);
        return view('backend.admin.users.index', compact('users'));
    }

    public function inactive()
    {
        $users = User::where('state_user', 'Inactivo')->paginate(15);
        // dd($user_deal);
        return view('backend.admin.users.inactive', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('id', 'ASC')->pluck('name', 'id');
        $provinces = Province::pluck('name_province', 'name_province');
        return view('backend.admin.users.create', compact('roles', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //dd($data);
        $user = User::create($request->all());

        if($user->genre_user == 'Masculino')
            $user->fill(['avatar_user' => 'temp/profile/default/male.png'])->save();
        else
            $user->fill(['avatar_user' => 'temp/profile/default/female.png'])->save();

        if ($request['password'])
            $user->fill(['password' => bcrypt($request['password'])])->save();

        $user->roles()->sync($request->get('rol'));

        Flash::success("Se registro a: " . $user->name_user . " " . $user->last_name_user . " con exito!");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // dd($employees);
        return view('backend.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::orderBy('id', 'ASC')->get();
        $provinces = Province::get();
        if ($user)
            return view('backend.admin.users.edit', compact('user', 'provinces', 'roles'));
        else
            return redirect()->route('home');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //dd($request);
        $user = User::find($id);
        $user->id_card_user = $request->id_card_user;
        $user->name_user = $request->name_user;
        $user->last_name_user = $request->last_name_user;
        $user->birth_date_user = $request->birth_date_user;
        $user->phone_user = $request->phone_user;
        $user->genre_user = $request->genre_user;

        $user->province_user = $request->province_user;
        $user->canton_user = $request->canton_user;
        $user->parish_user = $request->parish_user;
        $user->address_user = $request->address_user;

        $user->email = $request->email;
        if (!empty($request->password))
            $user->password = bcrypt($request->password);

        $user->state_user = $request->state_user;
        $user->save();

        $user->roles()->sync($request->get('rol'));

       /* $role = RoleUser::create([
            'role_id' => $request['rol'],
            'user_id' => $user->id,
        ]);*/

        Flash::success("Los datos de " . $user->name_user . " " . $user->last_name_user . " fueron actualizados con exito!");
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$user)
    {
        if ($request->ajax()) {
            //dd($user);
            $user = User::find($user);
            $user->state_user = 'Inactivo';
            $user->save();
            return response()->json([
                'message' => 'El estado del usuario a cambiado a Inactivo.',
            ]);
        }
    }

    public function active(Request $request,$user)
    {

            $user = User::find($user);
            $user->state_user = 'Activo';
            $user->save();

        Flash::success("El estado del usuario " . $user->name_user . " " . $user->last_name_user . " a cambiado a Activo.");
        return back();

    }

}
