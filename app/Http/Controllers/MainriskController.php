<?php

namespace App\Http\Controllers;

use App\Models\Mainrisk;
use App\Models\Riskepoint;
use App\Models\Riskseverities;
use App\Models\Riskstep;
use App\Models\Risksubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;
use Phattarachai\LineNotify\Line as LineNew;
use Line;

class MainriskController extends Controller
{
    public function index()
    {
        $mainrisks = Mainrisk::with(
            'riskepoint',
            'riskstep',
            'risksubject',
            'agencies',
            'riskseverities'
        )
            ->where('status_del', false)
            ->where('member_id', Auth::id())
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });

        $severities = Riskseverities::all();
        $steps = Riskstep::all();

        $count_inday = Mainrisk::whereDate('created_at', '=', date('Y-m-d'))
            ->where('member_id', Auth::id())
            ->where('status_del', false)
            ->count();

        $count_risk = Mainrisk::where('member_id', Auth::id())
            ->where('status_del', false)
            ->count();
        $count_manage = Mainrisk::where('member_id', Auth::id())
            ->where('status_del', false)
            ->where('riskstep_id', '<', 7)
            ->count();

        $count_complate = Mainrisk::where('member_id', Auth::id())
            ->where('status_del', false)
            ->where('riskstep_id', 7)
            ->count();

        return view(
            'risks.index',
            compact(
                'mainrisks',
                'severities',
                'steps',
                'count_inday',
                'count_risk',
                'count_manage',
                'count_complate'
            )
        );
    }

    public function create()
    {
        $risksubjects = Risksubject::where('publish', '=', '1')->get();
        $riskepoints = Riskepoint::all();
        $riskseverities = Riskseverities::where('publish', '=', '1')->get();
        return view(
            'risks.create',
            compact('risksubjects', 'riskepoints', 'riskseverities')
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'risksubject' => 'required',
            'risk_date' => 'required',
            'risk_time' => 'required',
            'riskepoint' => 'required',
            'riskseveritie' => 'required',
            'risk_details' => 'required',
            'risk_inmanage' => 'required',
        ]);

        $user = User::find(Auth::id());
        $member = $user->member()->first();

        DB::beginTransaction();
        try {
            $mainrisk = new Mainrisk();
            $mainrisk->risksubject_id = $request->risksubject;
            $mainrisk->isdate = $request->risk_date;
            $mainrisk->istime = $request->risk_time;
            $mainrisk->riskepoint_id = $request->riskepoint;
            $mainrisk->riskseverities_id = $request->riskseveritie;
            $mainrisk->risk_detail = trim($request->risk_details);
            $mainrisk->risk_inmanage = trim($request->risk_inmanage);
            $mainrisk->risk_note = trim($request->risk_note);
            $mainrisk->member_id = $member->id;
            $mainrisk->agencies_id = $member->agencies_id;
            $mainrisk->riskstep_id = 1;
            $mainrisk->save();
            DB::commit();

            $subject = Risksubject::find($request->risksubject);
            $epoint = Riskepoint::find($request->riskepoint);
            $severities = Riskseverities::find($request->riskseveritie);
            $date = $this->date_th($request->risk_date, 2);
            $time = $request->risk_time;

            $API_TOKEN = 'PvxxkqkEuWPcI0HI0yneqRcHDSLf2y6Dlcz9dKZ63Wl'; // API_TOKEN = Khirimat RM Admin
            $line = new LineNew($API_TOKEN);
            $message = "รายงานอุบัติการณ์\n";
            $message .= "รหัสอุบัติการณ์ : $mainrisk->id\n";
            $message .= "หัวข้ออุบัติการณ์ : ($subject->id) $subject->name_th\n";
            $message .= "วัน/เวลา : $date $time\n";
            $message .= "จุดเกิดเหตุ : ($epoint->id) $epoint->name\n";
            $message .= "เหตุอุบัติการณ์ : $request->risk_details\n";
            $message .= "แก้ไขเบื้องต้น : $request->risk_inmanage\n";
            $message .= "ระดับความรุนแรง : $severities->name\n";
            $code = '1F449'; // emoji id

            $bin = hex2bin(str_repeat('0', 8 - strlen($code)) . $code);
            $emoticon = mb_convert_encoding($bin, 'UTF-8', 'UTF-32BE');

            $message .= "$emoticon : " . env('LINE_URL_MASTER');
            $line->send($message);
            // Line::send($message);

            return $mainrisk;
            return redirect('risks')->with('success', 'บันทึกข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            DB::rollBack();
            return back()->with('error', 'ไม่สามารถบันทึกข้อมูลได้ ' . $ex);
        }
    }

    public function show($id)
    {
        $mainrisk = Mainrisk::with(
            'riskepoint',
            'riskstep',
            'risksubject',
            'agencies',
            'riskseverities',
            'program',
            'respon_workgroup',
            'teamrisks_join',
            'agencies_join',
            'uploadfiles'
        )
            ->where('status_del', false)
            ->where('id', $id)
            ->first();

        $mainrisk['isdate'] = $this->date_th($mainrisk['isdate'], 2);
        // return $mainrisk;
        return view('risks.show', compact('mainrisk'));
    }

    public function edit($id)
    {
        $risksubjects = RiskSubject::where('publish', '=', '1')->get();
        $riskepoints = RiskEpoint::all();
        $riskseverities = Riskseverities::where('publish', '=', '1')->get();

        $mainrisk = Mainrisk::with('riskepoint', 'riskstep', 'riskseverities')
            ->where('status_del', false)
            ->where('id', $id)
            ->get();
        return view('risks.edit', [
            'mainrisk' => $mainrisk,
            'risksubjects' => $risksubjects,
            'riskepoints' => $riskepoints,
            'riskseverities' => $riskseverities,
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'risk_id' => 'required',
            'risksubject' => 'required',
            'risk_date' => 'required',
            'risk_time' => 'required',
            'riskepoint' => 'required',
            'riskseveritie' => 'required',
            'risk_details' => 'required',
            'risk_inmanage' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $mainrisk = Mainrisk::find($request->risk_id);
            $mainrisk->risksubject_id = $request->risksubject;
            $mainrisk->isdate = $request->risk_date;
            $mainrisk->istime = $request->risk_time;
            $mainrisk->riskepoint_id = $request->riskepoint;
            $mainrisk->riskseverities_id = $request->riskseveritie;
            $mainrisk->risk_detail = trim($request->risk_details);
            $mainrisk->risk_inmanage = trim($request->risk_inmanage);
            $mainrisk->risk_note = trim($request->risk_note);
            $mainrisk->save();
            DB::commit();
            return redirect('risks')->with('success', 'บันทึกข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            DB::rollBack();
            return back()->with('error', 'ไม่สามารถบันทึกข้อมูลได้ ' . $ex);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $mainrisk = Mainrisk::find($id);
            $mainrisk->status_del = true;
            $mainrisk->save();
            DB::commit();
            return redirect('risks')->with('success', 'ลบข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            DB::rollBack();
            return back()->with('error', 'ไม่สามารถลบข้อมูลได้ ' . $ex);
        }
    }
}
