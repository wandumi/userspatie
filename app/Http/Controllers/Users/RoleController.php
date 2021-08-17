<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Roles = Role::with('permissions')->paginate(10);

        //@dd($Roles);

        return view('Admins.roles.index', compact('Roles') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('Admins.roles.create', compact('permissions') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // @dd( $request->all() );
        $this->validate($request, [
            'name' => 'required|max:50|unique:roles',
            'permissions' => 'required'
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = 'web';
        
        
        if($request->has('permissions'))
        {
            //@dd(collect( $request->permissions ));
            $role->givePermissionTo( $request->permissions );
        }

        $role->save();

        return redirect()->back()->with('success','Role added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id',$id)->first();
        //@dd($role->permissions);

        

        $permissions = Permission::all();



        return view('Admins.roles.edit', compact('permissions','role') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::where('id',$id)->first();

        //@dd($role);

        
        $role->name = $request->name;
        $role->guard_name = 'web';
        
        
        if($request->has('permission'))
        {
            //@dd(collect( $request->permission ));
            $role->syncPermissions( $request->permission );
        }
        
        $role->save();

        return redirect()->back()->with('success','Role / Permission updated successfully.');


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
