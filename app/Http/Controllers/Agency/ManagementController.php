<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Mainrisk;
use App\Models\Member;
use App\Models\Riskseverities;
use App\Models\TemporaryFile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PDOException;

class ManagementController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        // $agencie = $user->member->agencies->id;
        $workgroup = $user->member->agencies->workgroup->id;
        // $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program', 'respon_workgroup', 'teamrisks_join', 'agencies_join')
        //     ->where('status_del', false)
        //     ->where('riskstep_id', 4)
        //     ->whereHas('respon_workgroup', function ($q) use ($workgroup) {
        //         $q->where('id', '=', $workgroup);
        //     })
        //     ->get();
        // $mainrisks = $mainrisks->map(function ($item, $key) {
        //     $item['isdate'] = $this->date_th($item->isdate, 2);
        //     return $item;
        // });

        // $created_at = Mainrisk::whereHas('agencies', function ($q) use ($agencie) {
        //     $q->where('id', '=', $agencie);
        // })->whereDate('created_at', date("Y-m-d"))->count('id');

        // $reportall = Mainrisk::whereHas('agencies', function ($q) use ($agencie) {
        //     $q->where('id', '=', $agencie);
        // })->count('id');

        // $inprocess = Mainrisk::whereHas('agencies', function ($q) use ($agencie) {
        //     $q->where('id', '=', $agencie);
        // })->where('riskstep_id', '<>', 7)->count('id');

        // $complete = Mainrisk::whereHas('agencies', function ($q) use ($agencie) {
        //     $q->where('id', '=', $agencie);
        // })->where('riskstep_id', '=', 7)->count('id');

        // $workgroupres = Mainrisk::whereHas('respon_workgroup', function ($q) use ($workgroup) {
        //     $q->where('id', '=', $workgroup);
        // })->count('id');

        // $workgroupjoin = Mainrisk::whereHas('respon_workgroup', function ($q) use ($workgroup) {
        //     $q->where('id', '=', $workgroup);
        // })->count('id');

        // return $workgroupjoin;

        $agencies = Agency::where('workgroup_id', $workgroup)->get();
        $arr_agencies = $agencies->pluck('id');

        $created_at = Mainrisk::whereIn('agencies_id', $arr_agencies)->where('status_del', false)->whereDate('created_at', date("Y-m-d"))->count('id');
        $reportall = Mainrisk::whereIn('agencies_id', $arr_agencies)->where('status_del', false)->count('id');
        $inprocess = Mainrisk::whereIn('agencies_id', $arr_agencies)->where('status_del', false)->where('riskstep_id', '<>', 7)->count('id');
        $complete = Mainrisk::whereIn('agencies_id', $arr_agencies)->where('status_del', false)->where('riskstep_id', '=', 7)->count('id');

        $workgroupresY = Mainrisk::whereHas('respon_workgroup', function ($q) use ($workgroup) {
            $q->where('id', '=', $workgroup);
        })->where('status_del', false)->where('riskstep_id', 7)->count('id');

        $workgroupresN = Mainrisk::whereHas('respon_workgroup', function ($q) use ($workgroup) {
            $q->where('id', '=', $workgroup);
        })->where('status_del', false)->where('riskstep_id', '<>', 7)->count('id');

        $workgroupjoinN = Mainrisk::with(['agencies_join' => function ($q) use ($arr_agencies) {
            $q->whereIn('id', $arr_agencies);
        }])->whereHas('agencies_join', function ($q) use ($arr_agencies) {
            $q->whereIn('id', $arr_agencies);
        })->where('status_del', false)->where('riskstep_id', '<>', 7)->count('id');

        $workgroupjoinY = Mainrisk::with(['agencies_join' => function ($q) use ($arr_agencies) {
            $q->whereIn('id', $arr_agencies);
        }])->whereHas('agencies_join', function ($q) use ($arr_agencies) {
            $q->whereIn('id', $arr_agencies);
        })->where('status_del', false)->where('riskstep_id',  7)->count('id');

        $cmember = Member::whereIn('agencies_id', $arr_agencies)->count('id');

        $report_arr = ['reportday' => $created_at, 'reportall' => $reportall, 'inprocess' => $inprocess, 'complete' => $complete, 'workgroupresY' => $workgroupresY, 'workgroupresN' => $workgroupresN, 'workgroupjoinY' => $workgroupjoinY, 'workgroupjoinN' => $workgroupjoinN, 'cmember' => $cmember];
        // return $report_arr['reportday'];

        return view('agencies.index', compact('report_arr'));
    }

    public function manage()
    {
        $user = User::find(Auth::id());
        $workgroup = $user->member->agencies->workgroup->id;
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program', 'respon_workgroup', 'teamrisks_join', 'agencies_join')
            ->where('status_del', false)
            ->where('riskstep_id', 4)
            ->whereHas('respon_workgroup', function ($q) use ($workgroup) {
                $q->where('id', '=', $workgroup);
            })
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });
        return view('agencies.manage', compact('mainrisks'));
    }

    public function edit($id)
    {
        $user = User::find(Auth::id());
        $workgroup = $user->member->agencies->workgroup->id;
        $mainrisk = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program', 'respon_workgroup', 'teamrisks_join', 'agencies_join')
            ->where('status_del', false)
            ->where('riskstep_id', 4)
            ->where('id', $id)
            ->whereHas('respon_workgroup', function ($q) use ($workgroup) {
                $q->where('id', '=', $workgroup);
            })
            ->first();
        return view('agencies.edit', compact('mainrisk'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'risk_id' => 'required',
            'risk_solutions' => 'required',
            'riskstep_id' => 'required',
            'fileUpload' => 'mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $fileType = $file->getClientMimeType();
            $fileExtension = $file->getClientOriginalExtension();
            // $folder = uniqid() . '-' . now()->timestamp;
            $folder = 'agency';

            $path = $file->storeAs('public/uploads/risks/files/' . $folder, $fileName);

            $mainrisk = Mainrisk::find($request->risk_id);
            $mainrisk->risk_solutions = $request->risk_solutions;
            $mainrisk->riskstep_id = $request->riskstep_id;
            $mainrisk->uploadfiles()->create([
                'filepath' => $path,
                'filename' => $fileName,
                'filesize' => $fileSize,
                'filetype' => $fileType,
                'fileextension' => $fileExtension,
            ]);
            $mainrisk->save();
            return redirect('risks/agency/manage')->with('success', 'บันทึกข้อมูลสำเร็จ');
        }

        try {
            $mainrisk = Mainrisk::find($request->risk_id);
            $mainrisk->risk_solutions = $request->risk_solutions;
            $mainrisk->riskstep_id = $request->riskstep_id;
            $mainrisk->save();
            return redirect('risks/agency/manage')->with('success', 'บันทึกข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            return back()->with('error', 'ไม่สามารถบันทึกข้อมูลได้ ' . $ex);
        }
    }

    public function show()
    {
        $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program', 'respon_workgroup')
            ->where('status_del', false)
            ->where('riskstep_id', '>', 4)
            ->where('riskstep_id', '<', 7)
            ->get();
        $mainrisks = $mainrisks->map(function ($item, $key) {
            $item['isdate'] = $this->date_th($item->isdate, 2);
            return $item;
        });
        return view('agencies.show', compact('mainrisks'));
    }

    public function listevent()
    {
        // $mainrisks = Mainrisk::with('riskepoint', 'riskstep', 'risksubject', 'agencies', 'riskseverities', 'program', 'respon_workgroup')
        //     ->where('status_del', false)
        //     ->where('riskstep_id', '>', 4)
        //     ->where('riskstep_id', '<', 7)
        //     ->get();
        // $mainrisks = $mainrisks->map(function ($item, $key) {
        //     $item['isdate'] = $this->date_th($item->isdate, 2);
        //     return $item;
        // });

        $mainrisks = Mainrisk::count('id');
        return $mainrisks;
        $severities = Riskseverities::orderBy('name', 'ASC')->get();

        return view('agencies.listevent', compact('mainrisks', 'severities'));
    }
}
