<?php

namespace App\Http\Controllers\Settings\Organizations;

use App\Http\Controllers\Controller;
use App\Models\Missions;
use App\Models\Workgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class WorkgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workgroups = Workgroup::with('mission')->get();
        $workgroups = $workgroups->map(function ($item, $key) {
            $item['created_at_th'] = $this->date_th($item->created_at, 2);
            $item['updated_at_th'] = $this->date_th($item->updated_at, 2);
            return $item;
        });
        return view(
            'Settings.Organizations.Workgroups.index',
            compact('workgroups')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mission = Missions::all();
        return $mission;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'workgroup_name' => 'required',
            'mission_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $workgroup = new Workgroup();
            $workgroup->name = trim($request->workgroup_name);
            if ($request->workgroup_tokenline != '') {
                $workgroup->tokenline = trim($request->workgroup_tokenline);
            }
            $workgroup->mission_id = $request->mission_id;
            $workgroup->save();

            DB::commit();
            return response()->json([
                'success' => 'บันทึกข้อมูลสำเร็จขอบคุณค่ะ',
            ]);
        } catch (PDOException $ex) {
            DB::rollBack();
            return response()->json([
                'error' => 'ไม่สามารถบันทึกข้อมูลได้ ' . $ex->getMessage(),
            ]);
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
        $workgroups = Workgroup::find($id);
        $missions = Missions::all();
        return response()->json([
            'workgroups' => $workgroups,
            'missions' => $missions,
        ]);
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
            'workgroup_name' => 'required',
            'mission_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $workgroup = Workgroup::find($id);
            $workgroup->name = trim($request->workgroup_name);
            if ($request->workgroup_tokenline != '') {
                $workgroup->tokenline = trim($request->workgroup_tokenline);
            }
            $workgroup->mission_id = $request->mission_id;
            $workgroup->save();
            DB::commit();
            return response()->json([
                'success' => 'บันทึกข้อมูลสำเร็จขอบคุณค่ะ',
            ]);
        } catch (PDOException $ex) {
            DB::rollBack();
            return response()->json([
                'error' => 'ไม่สามารถบันทึกข้อมูลได้ ' . $ex->getMessage(),
            ]);
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
        DB::beginTransaction();
        try {
            $workgroup = Workgroup::find($id)->delete();
            DB::commit();
            return response()->json([
                'success' => 'ลบข้อมูลสำเร็จ',
            ]);
        } catch (PDOException $ex) {
            DB::rollBack();
            return response()->json([
                'error' => 'ไม่สามารถลบข้อมูลได้ ' . $ex->getMessage(),
            ]);
        }
    }
}
