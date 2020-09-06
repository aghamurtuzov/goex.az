<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    function __construct()
    {
//        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
//        $this->middleware('permission:role-create', ['only' => ['create','store']]);
//        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $roles = Role::with('permissions')->paginate(15);
        $permission = Permission::get();
        return view('admin.role.permission-role', compact('roles', 'permission'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();


        return view('permission-role.show', compact('role', 'rolePermissions'));
    }

    public function postRoleEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        try {
            $id = $request->get("id");
            if (!$id) {
                $role = Role::create(['name' => $request->get('name'), 'guard_name' => 'web']);
                $role->syncPermissions($request->get('permission'));
                $role = Role::where('id', $role->id)->with('permissions')->first();
                $message = 'Role əlavə olundu';
            } else {
                $role = Role::find($id);
                $role->name = $request->get('name');
                $role->save();
                $role->syncPermissions($request->input('permission'));
                $message = 'Role redaktə olundu';
            }
            return response()->json([
                'status' => 'true',
                'error' => '',
                'success' => 200,
                'role' => $role,
                'id' => $id,
                'message' => $message,
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage(), 'line' => $e->getLine()]);

        }

    }

    public function postPermissionEdit(Request $request)
    {
        try {
            $id = $request->get("id");
            if (!$id) {
                $permission = Permission::create($request->all());
                $permission = Permission::where('id', $permission->id)->first();
                $message = 'Permission əlavə olundu';
            } else {
                Permission::find($id)->update($request->all());
                $permission = Permission::find($id);
                $message = 'Permission redaktə olundu';
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage(), 'line' => $e->getLine()]);
        }
        return response()->json([
            'status' => 'true',
            'error' => '',
            'success' => 200,
            'permission' => $permission,
            'id' => $id,
            'message' => $message,
        ]);
    }

}
