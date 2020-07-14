<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    function __construct(){
        $this->middleware('permission:list-roles|create-roles|show-roles|edit-roles|delete-roles', ['only' => ['index','store']]);
        $this->middleware('permission:create-roles', ['only' => ['create','store']]);
        $this->middleware('permission:edit-roles', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-roles', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.roles.index',compact('roles','permissions'));
    }

    public function create(){
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);
        $name = ucfirst($request->input('name'));
        $role = Role::create(['name' => $name]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('admin.roles.index')->with('status','Role created successfully');
    }

    public function show($id){
        $role = Role::find($id);
        return view('admin.roles.show',compact('role'));
    }

    public function edit($id){
        $role = Role::find($id);
        $permissions = Permission::all();

        $permission_ids = $role->permissions()->pluck('id')->all();

        return view('admin.roles.edit',compact('role','permissions','permission_ids'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = ucfirst($request->input('name'));
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('admin.roles.index')->with('status','Role updated successfully');
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('status','Role deleted successfully');
    }
}
