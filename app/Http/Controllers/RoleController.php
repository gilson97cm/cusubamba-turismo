<?php

namespace App\Http\Controllers;

use App\Deal;
use App\PermissionRole;
use App\RoleUser;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::query()
            ->where('id','>', 1)
            ->paginate(10);
        return view('backend.admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a news resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('backend.admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request);
        $request->validate([
            'name' => ['required', 'unique:roles,name'],
            'slug' => ['required', 'unique:roles,slug'],
            'description' => 'max:250',
            'special' => 'nullable',
           // 'deal_ruc' => 'required',
        ],[
           'name.required' => 'Debe asignar un nombre al Rol.',
            'name.unique' => 'El Rol ya existe.',
            'slug.required' => 'Debe asignar una URL amigable al Rol.',
            'slug.unique' => 'La ruta ya está en uso, ingrese una ruta diferente.',
            'description.max' => 'La descripción debe ser breve y clara.',
          // 'special.required' => 'Si el Rol no tiene Permisos Especiales elija (Sin permisos especiales.)',
            //'deal_ruc.required' => 'No hay un Id de Negocio válido',
        ]);

      //  dd($request);

        $role = Role::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'description' => $request['description'],
            'special' => $request['special'],
            //'deal_ruc' => $request['deal_ruc'],
        ]);
        //actualicen los permisos
        $role->permissions()->sync($request->get('permissions'));
        Flash::success("Rol ".$role->name." agregado con exito!");
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //dd($role->id);

        $permissions = PermissionRole::query()
            ->join('roles','permission_role.role_id', '=', 'roles.id')
            ->join('permissions','permission_role.permission_id', '=', 'permissions.id')
            ->select('permissions.name','permissions.description','roles.special')
            ->where('roles.id',$role->id)
            ->paginate(5);
      $total = $permissions->count();
      //dd($permissions);
        //$permissions = Permission::get();
        return view('backend.admin.roles.show', compact('role','permissions','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //dd($role);
        $permissions = Permission::get();
        return view('backend.admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'description' => 'max:250',
            'special' => 'nullable',
            //'deal_ruc' => 'required',
        ],[
            'name.required' => 'Debe asignar un nombre al Rol.',
           // 'name.unique' => 'El Rol ya existe.',
            'slug.required' => 'Debe asignar una URL amigable al Rol.',
            //'slug.unique' => 'La ruta ya está en uso, ingrese una ruta diferente.',
            'description.max' => 'La descripción debe ser breve y clara.',
            // 'special.required' => 'Si el Rol no tiene Permisos Especiales elija (Sin permisos especiales.)',
            //'deal_ruc.required' => 'No hay un Id de Negocio válido',
        ]);

        //actualicen los roles
        $role->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'description' => $request['description'],
            'special' => $request['special'],
           // 'deal_ruc' => $request['deal_ruc'],
        ]);

        //actualicen los permisos
        $role->permissions()->sync($request->get('permissions'));
        Flash::success("Rol ".$role->name." actualizado con exito!");
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Role $role)
    {
        if ($request->ajax()){
            //dd($role->id);
            $us = RoleUser::query()
                ->where('role_id','=',$role->id)->get();
            foreach ($us as $u){
           // dd($u->id);
                $ru = RoleUser::find($u->id);
                $ru->role_id = 1;
                $ru->save();
            }
         $role->delete();
            return response()->json([
                'message' => $role->name. ' fue eliminado con exito.',
            ]);
        }
        //return back()->with('info', 'Eliminado con exito.');
    }
}
