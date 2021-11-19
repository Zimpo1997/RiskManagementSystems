@extends('layouts.defaults')
@section('fcss')
    <link rel="stylesheet" type="text/css"
        href="{{ URL::to('/') }}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::to('/') }}/src/plugins/datatables/css/responsive.bootstrap4.min.css">
@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>หน่วยงานของคุณ</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">หน่วยงานของคุณ</li>
                        </ol>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row pb-10">
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $report_arr['reportday'] }}</div>
                            <div class="font-14 text-secondary weight-500">รายงานวันนี้</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-calendar1"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $report_arr['reportall'] }}</div>
                            <div class="font-14 text-secondary weight-500">รายงานทั้งหมด</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#ff5b5b"><span class="icon-copy ti-heart"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $report_arr['inprocess'] }}</div>
                            <div class="font-14 text-secondary weight-500">กำลังดำเนินการ</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon"><i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $report_arr['complete'] }}</div>
                            <div class="font-14 text-secondary weight-500">ทบทวน</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-10">
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                {{ $report_arr['workgroupresY'] }}/{{ $report_arr['workgroupresN'] }}</div>
                            <div class="font-14 text-secondary weight-500">แก้ไขแล้ว / ต้องแก้ไข</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-calendar1"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                {{ $report_arr['workgroupjoinY'] }}/{{ $report_arr['workgroupjoinN'] }}</div>
                            <div class="font-14 text-secondary weight-500">ร่วมแก้ไขแล้ว / ต้องร่วมแก้ไข</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#ff5b5b"><span class="icon-copy ti-heart"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $report_arr['cmember'] }}</div>
                            <div class="font-14 text-secondary weight-500">บุคลากร</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#ff5b5b"><span class="icon-copy ti-heart"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    {{-- <h4 class="text-blue h4">อุบัติการณ์ความเสี่ยงของคุณ</h4> --}}
                </div>
                <div class="pull-right">
                    {{-- <a href="{{ URL::to('/risks/create') }}" class="btn btn-primary btn-sm scroll-click"><i
                        class="fa fa-plus"></i> รายงานอุบัติการณ์</a> --}}
                </div>
            </div>
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

        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/datatable-setting.js"></script>
@endsection
