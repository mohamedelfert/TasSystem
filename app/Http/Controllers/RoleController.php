<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
//        $roles = Role::where('name', '!=', 'super_admin')->orderBy('id', 'DESC')->paginate(10);
        $roles = Role::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('display_name', 'LIKE', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.roles.create',compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $data = Role::create(['name' => $request->input('name'), 'display_name' => $request->input('display_name')]);
        $data->syncPermissions($request->input('permissions'));

        toast(__('Added successfully'), 'success');
        return redirect(route('admin.roles.index'));
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)->get();
        return view('dashboard.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck("role_has_permissions.permission_id", "role_has_permissions.permission_id")
            ->all();
        return view('dashboard.roles.edit', compact('role', 'rolePermissions','permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        toast(__('Updated successfully'), 'success');
        return redirect(route('admin.roles.index'));
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.roles.index'));
    }

}
