<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function usersList()
    {
        $results = User::paginate(20);

        $roles = DB::table('roles')->where(['status' => true, 'is_deleted' => false])->get();

        return view("admin.users.users-list", ['results' => $results, 'roles' => $roles]);
    }

    public function getUserAdd()
    {
        $roles = Role::all();

        return view("admin.users.user-add")->with("roles", $roles);
    }

    public function getUserEdit($id)
    {
        $user = User::with('roles')->find($id);

        $roles = Role::all();

        $userRoles = json_decode(json_encode($user->roles->pluck('id')), true);

        return view('admin.users.user-edit', compact('user', 'roles', 'userRoles'));
    }

    public function postUserAdd(Request $request)
    {
        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $user->assignRole($request->input('roles'));

        return redirect()->back()->with('success-message', 'User created successfully');
    }

    public function postUserEdit(Request $request, $id)
    {

        $input = $request->all();

        if (!empty($input['password'])) {

            $input['password'] = Hash::make($input['password']);

        } else {

            unset($input["password"]);

        }
        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->back()->with('success-message', 'User updated successfully');
    }

}
