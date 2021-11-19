@extends('layouts.defaults')
@section('fcss')

@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>รายงานอุบัติการณ์</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายงานอุบัติการณ์</li>
                        </ol>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="frm-createrisk" method="post">
                @csrf
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label>หัวข้อเรื่อง / เหตุการณ์ <code>*</code></label>
                            <select class="custom-select2 form-control" id="risksubject" name="risksubject"
                                style="width: 100%; height: 38px;" required>
                                <option selected="" disabled>{{ __('gobal.pleaseSelect') }}</option>
                                @foreach ($risksubjects as $risksubject)
                                    <option value="{{ $risksubject->id }}">{{ $risksubject->id }} :
                                        {{ $risksubject->name_th }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="">วันที่เกิดเหตุ <code>*</code></label>
                            <input type="date" name="risk_date" id="risk_date" value="{{ date('Y-m-d') }}"
                                class="form-control" max="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="">เวลาที่เกิดเหตุ <code>*</code></label>
                            <input type="time" name="risk_time" id="risk_time" value="{{ date('H:i') }}"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">สถานที่เกิดเหตุ <code>*</code></label>
                            <select class="custom-select2 form-control col-12" id="riskepoint" name="riskepoint" required>
                                <option selected="" disabled>{{ __('gobal.pleaseSelect') }}</option>
                                @foreach ($riskepoints as $riskepoint)
                                    <option value="{{ $riskepoint->id }}">{{ $riskepoint->id }} :
                                        {{ $riskepoint->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label for="">ระดับความรุนแรง <code>*</code></label>
                            <select class="custom-select2 form-control col-12" id="riskseveritie" name="riskseveritie"
                                required>
                                <option selected="" disabled>{{ __('gobal.pleaseSelect') }}</option>
                                @foreach ($riskseverities as $riskseveritie)
                                    <option value="{{ $riskseveritie->id }}">{{ $riskseveritie->name }} :
                                        {{ $riskseveritie->slug }}</option>
                                    @if ($riskseveritie->id == 7)
                                        <option disabled role=separator></option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">รายละเอียดเหตุการณ์ <code>*</code></label>
                            <textarea class="form-control" name="risk_details" id="risk_details" cols="30" rows="10"
                                required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">การจัดการเบื้องต้น <code>*</code></label>
                            <textarea class="form-control" name="risk_inmanage" id="risk_inmanage" cols="30" rows="10"
                                required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">หมายเหตุ</label>
                            <textarea class="form-control" name="risk_note" id="risk_note" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                @can('edit-event-risk')
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">แก้ไขเหตุการณ์</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">ข้อเสนอแนะเกี่ยวกับเหตุการณ์</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                @endcan
                @can('update-status-risk')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">เปลี่ยนสถานะเหตุการณ์</label>
                                <select class="custom-select col-12">
                                    <option selected="">{{ __('gobal.pleaseSelect') }}</option>
                                    <option value="1">รอ RM ตรวจสอบ</option>
                                    <option value="2">รอ ผอ. อนุมัติ</option>
                                    <option value="3">หน่วยงานดำเนินการ</option>
                                    <option value="4">รอ ผอ. ยืนยัน</option>
                                    <option value="5">รอ RM จำหน่าย</option>
                                    <option value="6">ทบทวน</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endcan
                <div class="row">
                    <div class="col">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><i class="dw dw-diskette1"></i>
                                บันทึกข้อมูล</button>
                            <button type="button" onclick="window.location.reload()" class="btn btn-danger"><i
                                    class="dw dw-cancel"></i> ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $("#frm-createrisk").submit(function(e) {
            e.preventDefault();
            swal({
                    title: "คำเตือน!!!",
                    text: "กรุณาตรวจสอบก่อนบันทึกข้อมูลเพื่อป้องกันการผิดพลาด",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var risksubject = $("#risksubject").val();
                        var riskepoint = $("#riskepoint").val();
                        var riskseveritie = $("#riskseveritie").val();
                        if (risksubject == null) {
                            swal({
                                title: "กรุณาเลือก",
                                text: "กรุณาเลือกหัวข้อเรื่อง / เหตุการณ์",
                                icon: "warning",
                                button: "OK",
                            });
                        }
                        if (riskepoint == null) {
                            swal({
                                title: "กรุณาเลือก",
                                text: "กรุณาเลือกสถานที่เกิดเหตุ",
                                icon: "warning",
                                button: "OK",
                            });
                        }
                        if (riskseveritie == null) {
                            swal({
                                title: "กรุณาเลือก",
                                text: "กรุณาเลือกระดับความรุนแรง",
                                icon: "warning",
                                button: "OK",
                            });
                        }

                        if (risksubject != null && riskepoint != null && riskseveritie != null) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: '/risks/create',
                                data: $("#frm-createrisk").serializeArray(),
                                success: function(data) {
                                    console.log(data);
                                    if (data.id) {
                                        swal({
                                            title: "บันทึกสำเร็จ",
                                            text: "บันทึกข้อมูลสำเร็จขอบคุณค่ะ",
                                            icon: "success",
                                            button: false,
                                            timer: 1500,
                                        }).then((willDelete) => {
                                            window.location.href = "../risks";
                                        });
                                    } else {
                                        swal({
                                            title: "ผิดพลาด!!!",
                                            text: "error : " + JSON.stringify(data),
                                            icon: "error",
                                            button: "OK",
                                        });
                                    }
                                },
                            });
                        }
                    }
                });
        });
    </script>
@endsection
