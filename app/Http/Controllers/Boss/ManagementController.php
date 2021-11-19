<?php

namespace App\Http\Controllers\Boss;

use App\Http\Controllers\Controller;
use App\Models\Mainrisk;
use Illuminate\Http\Request;
use Phattarachai\LineNotify\Line as LineNew;
use Line;

class ManagementController extends Controller
{
    public function index()
    {
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program')
            ->where('status_del', false)
            ->where('riskstep_id', 3)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });
        return view('boss.index', compact('mainrisks'));
    }

    public function show()
    {
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program', 'respon_workgroup')
            ->where('status_del', false)
            ->where('riskstep_id', '>', 3)
            ->where('riskstep_id', '<', 7)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });
        return view('boss.show', compact('mainrisks'));
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

        return response()->json(['success' => 'บันทึกสำเร็จ']);
    }

    public function sendagency(Request $request)
    {
        $this->validate($request, [
            'risk_id' => 'required',
            'riskstep_id' => 'required',
        ]);
        $mainrisks = Mainrisk::find($request->risk_id);
        $mainrisks->riskstep_id = $request->riskstep_id;
        $mainrisks->save();

        $mainrisks = Mainrisk::with('respon_workgroup', 'teamrisks_join')
            ->where('id', $request->risk_id)
            ->first();
        // return $mainrisks->respon_workgroup->tokenline;

        // $API_TOKEN = "L86aPplAZLob595xRXL5UOthZAeJu1tBVI05TdoSATF"; // API_TOKEN = Khirimat Agency
        // $line = new LineNew($API_TOKEN);
        // $message = "รายงานอุบัติการณ์\n";
        // $message .= "รหัสอุบัติการณ์ : $mainrisk->id\n";
        // $message .= "หัวข้ออุบัติการณ์ : (" . $mainrisk->risksubject->id . ") " . $mainrisk->risksubject->name_th . "\n";
        // $message .= "วัน/เวลา : $date $time\n";
        // $message .= "จุดเกิดเหตุ : (" . $mainrisk->riskepoint->id . ") " . $mainrisk->riskepoint->name . "\n";
        // $message .= "เหตุอุบัติการณ์ : $request->risk_details\n";
        // $message .= "ระดับความรุนแรง : " . $mainrisk->riskseverities->name . "\n";
        // $message .= "โปรแกรม : " . $mainrisk->program->rp_name . "\n";
        // $message .= "จัดการ : www.rm-khirimat.com";
        // Line::send($message);

        // $API_TOKEN = $mainrisks->respon_workgroup->tokenline;
        // $line = new LineNew($API_TOKEN);
        // Line::send($message);

        return response()->json(['success' => 'บันทึกสำเร็จ']);
    }
}
