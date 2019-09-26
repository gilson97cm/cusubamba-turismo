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
    public function index()
    {
        $users = User::where('state_user', 'Activo')->paginate(15);
        return view('backend.admin.users.index',compact('users'));
    }

    public function inactive(){
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
        $roles = Role::orderBy('id','ASC')->pluck('name', 'id');
        $provinces = Province::pluck('name_province', 'name_province');
        return view('backend.admin.users.create', compact('roles', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //dd($data);
        $user = User::create($request->all());

        if($request['password'])
            $user->fill(['password' => bcrypt($request['password'])])->save();

        $role = RoleUser::create([
            'role_id' => $request['rol'],
            'user_id' => $user->id,
        ]);

        Flash::success("Se registro a: ".$user->name_user." ".$user->last_name_user." con exito!");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::orderBy('id', 'ASC')->get();
        $provinces = Province::get();
        if ($user)
            return view('backend.admin.users.edit', compact( 'user', 'provinces', 'roles'));
        else
            return redirect()->route('home');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
