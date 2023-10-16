<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionsController extends Controller
{
    public function createPermissions()
    {
        return view('admin.permissions.add');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $permission =  Permission::create([
            'name' => $request->modul_parent,
            'display_name' => $request->modul_parent,
            'parent_id' => 0,
        ]);
        foreach ($request->modul_childrent as $value) {
            Permission::create([
                'name' => $value,
                'display_name' => $value,
                'parent_id' => $permission->id,
                'key_code' => $request->modul_parent . '_' . $value
            ]);
        }
    }
}
