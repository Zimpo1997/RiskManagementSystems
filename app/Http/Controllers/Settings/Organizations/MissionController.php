<?php

namespace App\Http\Controllers\Settings\Organizations;

use App\Http\Controllers\Controller;
use App\Models\Missions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $missions = Missions::all();
        $missions = $missions->map(function ($item, $key) {
            $item['created_at_th'] = $this->date_th($item->created_at, 2);
            $item['updated_at_th'] = $this->date_th($item->updated_at, 2);
            return $item;
        });
        return view(
            'Settings.Organizations.Missions.index',
            compact('missions')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'mission_name' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $mission = new Missions();
            $mission->name = trim($request->mission_name);
            $mission->save();
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
        $mission = Missions::find($id);
        return $mission;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mission_name' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $mission = Missions::find($id);
            $mission->name = trim($request->mission_name);
            $mission->save();
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
            $mission = Missions::find($id)->delete();
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
