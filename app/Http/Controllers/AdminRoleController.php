<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleAddRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->permission = $permission;
        $this->role = $role;
    }
    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionsParent'));
    }
    public function store(RoleAddRequest $request)
    {
        $role =  $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $roles = $role->permissions()->attach($request->permission_id);
        dd($roles);
        return redirect()->route('roles.index');
    }
    public function edit($id)
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionChecked = $role->permissions;
        // dd($permissionCheked);
        return view('admin.role.edit', compact('permissionsParent', 'role', 'permissionChecked'));
    }
    public function update(Request $request, $id)
    {
        $role =  $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permissions()->sync($request->permission_id);

        return redirect()->route('roles.index');
    }
}
