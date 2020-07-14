<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = Admin::orderBy('id','DESC')->get();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = Admin::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')->with('status','User created successfully');
    }

    public function show($id){
        $user = Admin::find($id);
        return view('admin.users.show',compact('user'));
    }

    public function edit($id){
        $user = Admin::find($id);
        $roles = Role::all();
        $role_ids = $user->roles()->pluck('id')->all();

        return view('admin.users.edit',compact('user','roles','role_ids'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'email' => 'required|email|unique:admins,email,'.$id,
            'password' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = $request->except('password');
        }

        $user = Admin::find($id);
        $user->update($input);

        $user->syncRoles($request->input('roles'));

        return redirect()->route('admin.users.index')->with('status','User updated successfully');
    }

    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect()->route('admin.users.index')->with('status','User deleted successfully');
    }
}
