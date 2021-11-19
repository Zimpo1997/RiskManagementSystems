@extends('layouts.defaults')
@section('fcss')

@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        {{-- <h4>อุบัติการณ์ความเสี่ยง</h4> --}}
                        <a href="#" onclick="window.history.back();" class="btn btn-secondary"><i
                                class="icon-copy dw dw-left-arrow2"></i>
                            กลับก่อนหน้า</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">อุบัติการณ์ความเสี่ยง</li>
                        </ol>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        {{-- <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
        </div> --}}
        <div class="row">
            <div class="col-sm-12 col-md-4 mb-10">
                <div class="card card-box text-left">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th scope="col"> <strong class="font-16 weight-600">รหัสความเสี่ยง</strong></th>
                                <td scope="row" class="text-center">
                                    <p>00{{ $mainrisk->id }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col"><strong class="font-16 weight-600">ระดับความรุนแรง</strong></th>
                                <td scope="row" class="text-center">
                                    <span class="badge text-white" style="width:110px;"
                                        data-bgcolor="{{ $mainrisk->riskseverities->color }}">{{ $mainrisk->riskseverities->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">ขั้นตอนการทำงาน</th>
                                <td scope="row" class="text-center">
                                    <span class="badge badge-pill text-white m-0"
                                        data-bgcolor="{{ $mainrisk->riskstep->color }}">{{ $mainrisk->riskstep->name }}</span>
                                </td>
                            </tr>
                            @if ($mainrisk->riskstep_id > 1)
                                <tr>
                                    <th scope="col"><strong class="font-16 weight-600">โปรแกรมความเสี่ยง</strong></th>
                                    <td scope="row" class="text-center">
                                        <p>{{ $mainrisk->program->rp_name }}</p>
                                    </td>
                                </tr>
                            @endif
                            @if ($mainrisk->riskstep_id > 2)
                                <tr>
                                    <th scope="col"><strong class="font-16 weight-600">กลุ่มงานหลักที่ต้องแก้ไข</strong>
                                    </th>
                                    <td scope="row" class="text-center">
                                        <p>{{ $mainrisk->respon_workgroup->name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"><strong class="font-16 weight-600">หน่วยงานที่ต้องร่วมแก้ไข</strong>
                                    </th>
                                    <td scope="row" class="text-center">
                                        <p>
                                            @foreach ($mainrisk->agencies_join as $aj)
                                                {{ $aj->name }}
                                            @endforeach
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"><strong class="font-16 weight-600">ทีมที่ต้องร่วมแก้ไข</strong>
                                    </th>
                                    <td scope="row" class="text-center">
                                        <p>
                                            @foreach ($mainrisk->teamrisks_join as $tj)
                                                {{ $tj->name }}
                                            @endforeach
                                        </p>
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 mb-10">
                <div class="card card-box">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">หัวข้อเรื่อง / เหตุการณ์</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risksubject->id . ' : ' . $mainrisk->risksubject->name_th }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">วัน เวลา ที่เกิดเหตุ</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->isdate . ' เวลา ' . $mainrisk->istime }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">สถานที่เกิดเหตุ</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->riskepoint->id . ' : ' . $mainrisk->riskepoint->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">ประเภทความเสี่ยง</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risksubject->riskgroup->slug }} :
                                    {{ $mainrisk->risksubject->riskgroup->name_th }}
                                    ({{ $mainrisk->risksubject->riskgroup->name_en }})</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">รายละเอียดเหตุการณ์</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risk_detail }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">การจัดการเบื้องต้น</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risk_inmanage }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">หมายเหตุ</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risk_note }}</p>
                            </div>
                        </div>
                        @if ($mainrisk->riskstep_id > 4)
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <strong class="font-16 weight-600">ข้อเสนอแนะ</strong>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <p>{{ $mainrisk->risk_solutions }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <strong class="font-16 weight-600">จัดการแก้ไขปัญหา</strong>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <p>{{ $mainrisk->risk_solutions }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <strong class="font-16 weight-600">เอกสารประกอบ</strong>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    @if ($mainrisk->uploadfiles != null)
                                        <a href="/download/{{ $mainrisk->uploadfiles->id }}"
                                            target="_blank">กดเพื่อดาวน์โหลด</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-10">
            <div class="col-sm-12 col-md-12">
                <div class="card card-box">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">หัวข้อเรื่อง / เหตุการณ์</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risksubject->id . ' : ' . $mainrisk->risksubject->name_th }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">วัน เวลา ที่เกิดเหตุ</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->isdate . ' เวลา ' . $mainrisk->istime }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">สถานที่เกิดเหตุ</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->riskepoint->id . ' : ' . $mainrisk->riskepoint->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">ประเภทความเสี่ยง</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risksubject->riskgroup->slug }} :
                                    {{ $mainrisk->risksubject->riskgroup->name_th }}
                                    ({{ $mainrisk->risksubject->riskgroup->name_en }})</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">รายละเอียดเหตุการณ์</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risk_detail }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">การจัดการเบื้องต้น</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risk_inmanage }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <strong class="font-16 weight-600">หมายเหตุ</strong>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <p>{{ $mainrisk->risk_note }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
