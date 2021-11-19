<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $roles = $roles->map(function ($item, $key) {
            $item['created_at_th'] = $this->date_th($item->created_at, 2);
            $item['updated_at_th'] = $this->date_th($item->updated_at, 2);
            return $item;
        });
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_th' => 'required',
            'name_en' => 'required',
            'slug' => 'required',
            'permission' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $role = new Role();
            $role->name_en = trim($request->name_en);
            $role->name_th = trim($request->name_th);
            $role->slug = trim($request->slug);
            $role->save();
            $role->permissions()->attach($request->permission);
            DB::commit();
            return redirect('roles')->with('success', 'บันทึกข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            DB::rollBack();
            return back()->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
        }
    }

    public function edit($id)
    {
        $roles = Role::find($id);
        $mypermissions = $roles->permissions()->get();

        $permissions = Permission::all();
        return view('roles.edit', compact('roles', 'mypermissions', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_th' => 'required',
            'name_en' => 'required',
            'slug' => 'required',
            'permission' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $role = Role::find($id);
            $role->name_en = trim($request->name_en);
            $role->name_th = trim($request->name_th);
            $role->slug = trim($request->slug);
            $role->save();
            $role->permissions()->sync($request->permission);
            DB::commit();
            return redirect('roles')->with('success', 'บันทึกข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            DB::rollBack();
            return back()->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::find($id)->delete();
            return back()->with('success', 'ลบข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            return back()->with('error', 'ไม่สามารถลบข้อมูลได้');
        }
    }
}
