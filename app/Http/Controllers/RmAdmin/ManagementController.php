<?php

namespace App\Http\Controllers\RmAdmin;

use App\Http\Controllers\Controller;
use App\Models\Mainrisk;
use App\Models\Program;
use Illuminate\Http\Request;
use Phattarachai\LineNotify\Line as LineNew;
use Line;

class ManagementController extends Controller
{
    public function index()
    {
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities')
            ->where('status_del', false)
            ->where('riskstep_id', 1)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });
        $programs = Program::all();
        return view('rmadmins.index', compact('mainrisks', 'programs'));
    }


    public function show()
    {
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program')
            ->where('status_del', false)
            ->where('riskstep_id', '>', 1)
            ->where('riskstep_id', '<', 7)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });
        // return $mainrisks[0]->program->rp_name;
        return view('rmadmins.show', compact('mainrisks'));
    }

    public function showbackprogram()
    {
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program')
            ->where('status_del', false)
            ->where('riskstep_id', 99)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });
        $programs = Program::all();
        return view('rmadmins.show-back', compact('mainrisks', 'programs'));
    }


    public function sendprogram(Request $request)
    {
        $this->validate($request, [
            'risk_id' => 'required',
            'program_id' => 'required',
            'riskstep_id' => 'required',
        ]);

        $mainrisks = Mainrisk::find($request->risk_id);
        $mainrisks->program_id = $request->program_id;
        $mainrisks->riskstep_id = $request->riskstep_id;
        $mainrisks->risk_comment = null;
        $mainrisks->save();

        $mainrisk = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program')
            ->where('status_del', false)
            ->where('id', '=', $mainrisks->id)
            ->first();
        $date = $this->date_th($mainrisk->isdate, 2);
        $time = $mainrisk->istime;

        if ($mainrisk->program->rp_token_line != "") { //ตรวจสอบว่ามีโทเคนเข้ามาหรือไม่
            $API_TOKEN = $mainrisk->program->rp_token_line; // API_TOKEN = Khirimat RM Program
            // $API_TOKEN = "JGeuRdiEEJLSOsO0jURsquQ0lNKhHTHqtZUkw2FbFlH"; // API_TOKEN = Khirimat RM Program
            $line = new LineNew($API_TOKEN);
            $message = "รายงานอุบัติการณ์\n";
            $message .= "รหัสอุบัติการณ์ : $mainrisk->id\n";
            $message .= "หัวข้ออุบัติการณ์ : (" . $mainrisk->risksubject->id . ") " . $mainrisk->risksubject->name_th . "\n";
            $message .= "วัน/เวลา : $date $time\n";
            $message .= "จุดเกิดเหตุ : (" . $mainrisk->riskepoint->id . ") " . $mainrisk->riskepoint->name . "\n";
            $message .= "เหตุอุบัติการณ์ : $request->risk_details\n";
            $message .= "ระดับความรุนแรง : " . $mainrisk->riskseverities->name . "\n";
            $message .= "โปรแกรม : " . $mainrisk->program->rp_name . "\n";

            $code = '1F449'; // emoji id
            $bin = hex2bin(str_repeat('0', 8 - strlen($code)) . $code);
            $emoticon = mb_convert_encoding($bin, 'UTF-8', 'UTF-32BE');
            $message .= "$emoticon : " . env('LINE_URL_MASTER');
            $line->send($message);
            // Line::send($message);
        }
        return $mainrisks;
    }
}
