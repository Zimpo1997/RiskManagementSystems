@extends('layouts.defaults')
@section('fcss')

@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>แก้ไขอุบัติการณ์</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แก้ไขอุบัติการณ์</li>
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
            <form action="/risks/update" method="post">
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
                    <input type="hidden" name="risk_id" value="{{ $mainrisk[0]->id }}">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label>หัวข้อเรื่อง / เหตุการณ์ <code>*</code></label>
                            <select class="custom-select2 form-control" id="risksubject" name="risksubject"
                                style="width: 100%; height: 38px;" required>
                                <option selected="" disabled>{{ __('gobal.pleaseSelect') }}</option>
                                @foreach ($risksubjects as $risksubject)
                                    <option value="{{ $risksubject->id }}" @if ($risksubject->id == $mainrisk[0]->risksubject_id) selected @endif>{{ $risksubject->id }} :
                                        {{ $risksubject->name_th }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="">วันที่เกิดเหตุ <code>*</code></label>
                            <input type="date" name="risk_date" id="risk_date"
                                value="{{ isset($mainrisk[0]->isdate) ? $mainrisk[0]->isdate : date('Y-m-d') }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="">เวลาที่เกิดเหตุ <code>*</code></label>
                            <input type="time" name="risk_time" id="risk_time"
                                value="{{ isset($mainrisk[0]->istime) ? $mainrisk[0]->istime : date('H:i') }}"
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
                                    <option value="{{ $riskepoint->id }}" @if ($riskepoint->id == $mainrisk[0]->riskepoint_id) selected @endif>{{ $riskepoint->id }} :
                                        {{ $riskepoint->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label for="">ระดับความรุนแรง <code>*</code></label>
                            <select class="custom-select2 form-control col-12" id="riskseveritie" name="riskseveritie">
                                <option selected="" disabled>{{ __('gobal.pleaseSelect') }}</option>
                                @foreach ($riskseverities as $riskseveritie)
                                    <option value="{{ $riskseveritie->id }}" @if ($riskseveritie->id == $mainrisk[0]->riskseverities_id) selected @endif>{{ $riskseveritie->name }} :
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
                            <textarea class="form-control" name="risk_details" id="risk_details" cols="30"
                                rows="10">{{ $mainrisk[0]->risk_detail }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">การจัดการเบื้องต้น <code>*</code></label>
                            <textarea class="form-control" name="risk_inmanage" id="risk_inmanage" cols="30"
                                rows="10">{{ $mainrisk[0]->risk_inmanage }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">หมายเหตุ</label>
                            <textarea class="form-control" name="risk_note" id="risk_note" cols="30"
                                rows="10">{{ $mainrisk[0]->risk_note }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><i class="dw dw-diskette1"></i>
                                บันทึกข้อมูล</button>
                            <a href="#" onclick="window.history.back();" class="btn btn-danger"><i class="dw dw-cancel"></i>
                                ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
