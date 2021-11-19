<?php

namespace App\Http\Controllers\RmProgram;

use App\Http\Controllers\Controller;
use App\Models\Mainrisk;
use App\Models\Teamrisk;
use App\Models\User;
use App\Models\Workgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $programs = $user->programs;

        $arr = array();
        foreach ($programs as $program) {
            array_push($arr, $program['id']);
        }
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program')
            ->where('status_del', false)
            ->where('riskstep_id', 2)
            ->whereIn('program_id', $arr)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });

        $workgroups = Workgroup::with('agency')->get();
        $teams = Teamrisk::all();
        return view('rmprograms.index', compact('mainrisks', 'workgroups', 'teams'));
    }

    public function show()
    {
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program', 'respon_workgroup')
            ->where('status_del', false)
            ->where('riskstep_id', '>', 2)
            ->where('riskstep_id', '<', 7)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });
        return view('rmprograms.show', compact('mainrisks'));
    }

    public function check(Request $request)
    {
        $mainrisks = Mainrisk::with('respon_workgroup', 'teamrisks_join', 'agencies_join')
            ->where('status_del', false)
            ->where('id',  $request->risk_id)
            ->first();
        return response()->json(compact('mainrisks'));
    }

    public function showbackprogram()
    {
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program', 'respon_workgroup', 'teamrisks_join', 'agencies_join')
            ->where('status_del', false)
            ->where('riskstep_id', 98)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });

        $workgroups = Workgroup::with('agency')->get();
        $teams = Teamrisk::all();
        // return $mainrisks;
        return view('rmprograms.show-back', compact('mainrisks', 'workgroups', 'teams'));
    }

    public function backprogram(Request $request)
    {
        if ($request->back_comment == "") {
            return response()->json(['error' => 'กรุณากรอกเหตุผลการส่งคืน']);
        }

        $this->validate($request, [
            'risk_id' => 'required',
            'back_comment' => 'required',
            'riskstep_id' => 'required',
        ]);

        $mainrisks = Mainrisk::find($request->risk_id);
        $mainrisks->riskstep_id = $request->riskstep_id;
        $mainrisks->risk_comment = trim($request->back_comment);
        $mainrisks->save();
        $mainrisks->agencies_join()->sync($request->mainrisks_agencies_join);
        $mainrisks->teamrisks_join()->sync($request->mainrisks_teamrisks_join);

        return response()->json(['success' => 'บันทึกสำเร็จ']);
    }

    public function sendagency(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'risk_id' => 'required',
            'respon_workgroup' => 'required',
            'riskstep_id' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages;
            return response()->json(['success_code' => 401, 'response_code' => 0, 'response_message' => $msg]);
        }

        $mainrisks = Mainrisk::find($request->risk_id);
        $mainrisks->respon_workgroup_id = $request->respon_workgroup;
        $mainrisks->riskstep_id = $request->riskstep_id;
        $mainrisks->save();
        $mainrisks->agencies_join()->attach($request->mainrisks_agencies_join);
        $mainrisks->teamrisks_join()->attach($request->mainrisks_teamrisks_join);
        // return response()->json(['success' => 'บันทึกสำเร็จ']);
        return response()->json(['success_code' => 200]);
    }

    public function sendagainagency(Request $request)
    {
        $this->validate($request, [
            'risk_id' => 'required',
            'respon_workgroup' => 'required',
            'riskstep_id' => 'required',
        ]);

        $mainrisks = Mainrisk::find($request->risk_id);
        $mainrisks->respon_workgroup_id = $request->respon_workgroup;
        $mainrisks->riskstep_id = $request->riskstep_id;
        $mainrisks->risk_comment = null;
        $mainrisks->save();
        $mainrisks->agencies_join()->sync($request->mainrisks_agencies_join);
        $mainrisks->teamrisks_join()->sync($request->mainrisks_teamrisks_join);
        return response()->json(['success' => 'บันทึกสำเร็จ']);
    }
}
