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
                        <h4>อุบัติการณ์ความเสี่ยงของคุณ</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">อุบัติการณ์ความเสี่ยงของคุณ</li>
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
                            <div class="weight-700 font-24 text-dark">{{ $count_inday }}</div>
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
                            <div class="weight-700 font-24 text-dark">{{ $count_risk }}</div>
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
                            <div class="weight-700 font-24 text-dark">{{ $count_manage }}</div>
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
                            <div class="weight-700 font-24 text-dark">{{ $count_complate }}</div>
                            <div class="font-14 text-secondary weight-500">จำหน่ายแล้ว</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money"
                                    aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    {{-- <h4 class="text-blue h4">อุบัติการณ์ความเสี่ยงของคุณ</h4> --}}
                    {{-- @foreach ($severities as $severitie)
                        <span class="badge badge-pill text-white mb-1"
                            data-bgcolor="{{ $severitie->color }}">{{ $severitie->name }}</span>
                    @endforeach
                    @foreach ($steps as $step)
                        <span class="badge badge-pill text-white mb-1"
                            data-bgcolor="{{ $step->color }}">{{ $step->name }}</span>
                    @endforeach --}}
                </div>
                <div class="pull-right">
                    @can('create-users')
                        <a href="{{ URL::to('/risks/create') }}" class="btn btn-primary btn-sm scroll-click"><i
                                class="fa fa-plus"></i> รายงานอุบัติการณ์</a>
                    @endcan

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
            <table class="data-table table stripe hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col" width="8%" class="table-plus datatable-nosort">รหัสเหตุการณ์</th>
                        <th scope="col" width="8%">วันที่เกิดเหตุ</th>
                        <th scope="col">รายละเอียดเหตุการณ์</th>
                        <th scope="col" width="10%">สถานที่เกิดเหตุ</th>
                        <th scope="col" width="10%">ความรุนแรง</th>
                        <th scope="col" width="10%">สถานะ</th>
                        <th scope="col" width="12%" class="datatable-nosort">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mainrisks as $risk)
                        <tr>
                            <th scope="row" class="text-center">{{ $risk->id }}</th>
                            <td class="text-center">{{ $risk->isdate }} <br> {{ $risk->istime }}</td>
                            <td>{{ $risk->risk_detail }}</td>
                            <td class="text-center">{{ $risk->riskepoint->name }}</td>
                            <td class="text-center"><span class="badge badge-pill text-white w-50"
                                    data-bgcolor="{{ $risk->riskseverities->color }}">{{ $risk->riskseverities->name }}</span>
                            </td>
                            <td class="text-center"><span class="badge badge-pill text-white"
                                    data-bgcolor="{{ $risk->riskstep->color }}">{{ $risk->riskstep->name }}</span>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info mb-1" data-toggle="tooltip" title="ดูรายละเอียด"
                                    href="{{ URL::to("/risks/show/{$risk->id}") }}"><i class="dw dw-eye"></i></a>
                                @if ($risk->riskstep_id == 1)
                                    <a class="btn btn-sm btn-warning mb-1" data-toggle="tooltip" title="แก้ไข"
                                        href="{{ URL::to("/risks/edit/{$risk->id}") }}"><i
                                            class="dw dw-edit2"></i></a>
                                    <a class="btn btn-sm btn-danger mb-1" data-toggle="tooltip" title="ลบ"
                                        onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')"
                                        href="{{ URL::to("/risks/delete/{$risk->id}") }}"><i
                                            class="dw dw-delete-3"></i></a>
                                @endif

                            </td>
                            {{-- <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        @can('show-users')
                                            <a class="dropdown-item text-info" href="#"><i class="dw dw-eye"></i> View</a>
                                        @endcan
                                        @can('edit-users')
                                            <a class="dropdown-item text-warning"
                                                href="{{ URL::to("/user/edit/{$user->id}") }}"><i class="dw dw-edit2"></i>
                                                Edit</a>
                                        @endcan
                                        @can('delete-users')
                                            <a class="dropdown-item text-danger"
                                                onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')"
                                                href="{{ URL::to("/user/delete/{$user->id}") }}"><i
                                                    class="dw dw-delete-3"></i>
                                                Delete</a>
                                        @endcan
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
