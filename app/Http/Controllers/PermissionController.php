<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        $permissions = $permissions->map(function ($item, $key) {
            $item['created_at_th'] = $this->date_th($item->created_at, 2);
            $item['updated_at_th'] = $this->date_th($item->updated_at, 2);
            return $item;
        });
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $test = trim("Hello WORLD ALL"); // trim(ตัวหนังสือที่ใส่เข้ามา) ตัดช่องว่างทั้งข้างหน้าและข้างหลังข้อความ
        // $test = strtolower($test); // strtolower(ตัวหนังสือที่ใส่เข้ามา) เปลี่ยนตัวหนังสือทุกตัวให้เป็นตัวเล็ก
        // $test = str_replace(" ", "_", $test);  // str_replace(ตัวเลือกที่ต้องการ, ต้องการจะให้เปลี่ยนเป็นอะไร, ตัวหนังสือที่ใส่เข้ามา) เปลี่ยนช่องว่างทุกช่อง ให้เป็นขีดเส้นใต้ หรือ อันเดอสกอ
        // echo substr($test, 0, 3) . "-" . substr($test, 3);

        $this->validate($request, [
            'name_en' => 'required',
            'name_th' => 'required',
            'slug' => 'required',
        ]);

        $slug = trim($request->slug);
        $slug = strtolower($slug);
        $slug = str_replace(" ", "_", $slug);

        DB::beginTransaction();
        try {
            $permission = new Permission();
            $permission->name_en = trim($request->name_en);
            $permission->name_th = trim($request->name_th);
            $permission->slug = trim($slug);
            $permission->save();
            DB::commit();
            return redirect('permissions')->with('success', 'บันทึกข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            DB::rollBack();
            return back()->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
        }
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
        $permission = Permission::find($id);
        return view('permissions.edit', compact('permission'));
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
        $this->validate($request, [
            'name_en' => 'required',
            'name_th' => 'required',
            'slug' => 'required',
        ]);

        $slug = trim($request->slug);
        $slug = strtolower($slug);
        $slug = str_replace(" ", "_", $slug);

        DB::beginTransaction();
        try {
            $permission = Permission::find($id);
            $permission->name_en = trim($request->name_en);
            $permission->name_th = trim($request->name_th);
            $permission->slug = trim($slug);
            $permission->save();
            DB::commit();
            return redirect('permissions')->with('success', 'บันทึกข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            DB::rollBack();
            return back()->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $permission = Permission::find($id)->delete();
            return back()->with('success', 'ลบข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            return back()->with('error', 'ไม่สามารถลบข้อมูลได้');
        }
    }
}
