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
                        <h4>รายการความเสี่ยง</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายการความเสี่ยง</li>
                        </ol>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- basic table  Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    {{-- <h4 class="text-blue h4">จัดการบทบาท</h4> --}}
                </div>
                <div class="pull-right">
                    {{-- <a href="{{ URL::to('/roles/create') }}" class="btn btn-primary btn-sm scroll-click"><i
                            class="fa fa-user-plus"></i> เพิ่มบทบาท</a> --}}
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
                        <th scope="col" width="10%">โปรแกรม</th>
                        <th scope="col" width="10%">กลุ่มงานที่แก้ไข</th>
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
                            <td class="text-center">{{ $risk->program->rp_name }}</td>
                            <td class="text-center">{{ $risk->respon_workgroup->name }}</td>
                            <td class="text-center"><span class="badge badge-pill text-white w-50"
                                    data-bgcolor="{{ $risk->riskseverities->color }}">{{ $risk->riskseverities->name }}</span>
                            </td>
                            <td class="text-center"><span class="badge badge-pill text-white"
                                    data-bgcolor="{{ $risk->riskstep->color }}">{{ $risk->riskstep->name }}</span>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="{{ URL::to("/risks/show/{$risk->id}") }}"><i
                                        class="dw dw-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- basic table  End -->
    </div>

@endsection
@section('scripts')
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/datatable-setting.js"></script>
@endsection
