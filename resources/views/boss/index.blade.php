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
                        <h4>ตรวจสอบความเสี่ยง</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ตรวจสอบความเสี่ยง</li>
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
                        <th scope="col" width="15%" class="datatable-nosort">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mainrisks as $risk)
                        <tr id="trID_{{ $risk->id }}">
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
                                @can('show-risk')
                                    <a class="btn btn-sm btn-info mb-1" data-toggle="tooltip" title="ดูรายละเอียด"
                                        href="{{ URL::to("/risks/show/{$risk->id}") }}"><i class="dw dw-eye"></i></a>
                                @endcan

                                @can('boss_back_risk')
                                    <button type="button" class="btn btn-sm mb-1 showModal" title="ไม่อนุมัติ"
                                        data-bgcolor="#db4437" data-color="#ffffff" data-toggle="modal"
                                        data-target="#modalBackRisk">
                                        <i class="icon-copy dw dw-cancel"></i>
                                    </button>
                                @endcan
                                @can('boss_send_risk')
                                    <button type="button" class="btn btn-sm btn-success mb-1 send_risk"
                                        data-id="{{ $risk->id }}" data-toggle="tooltip" title="อนุมัติ">
                                        <i class="icon-copy dw dw-checked"></i>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- basic table  End -->
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="modalBackRisk" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ไม่อนุมัติความเสี่ยง รหัสเหตุการณ์ : <span
                            id="showRiskID"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="back-risk_id">
                    <fieldset class="border p-2 mb-2">
                        <legend class="w-auto bg-secondary text-white rounded p-2 h4">เหตุผลที่ไม่อนุมัติ</legend>
                        <div class="form-group">
                            <textarea name="back_comment" id="back_comment" cols="30" rows="10"
                                class="form-control"></textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bgcolor="#db4437" data-color="#ffffff" id="btn-backtoadmin"><i
                            class="dw dw-curved-arrow1"></i>
                        ส่งคืน</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/datatable-setting.js"></script>
    <script>
        $(function() {
            $(".showModal").click(function() {
                var row = $(this).closest('tr');
                var rowID = row.attr('id').split('_')[1];
                $("#back-risk_id").val(rowID);
                $("#risk_id").val(rowID);
                $("#showRiskID").html(rowID);
            });

            $("#btn-backtoadmin").click(function() {
                var risk_id = $("#back-risk_id").val();
                var back_comment = $("#back_comment").val();
                var riskstep_id = 98;
                var _token = $('meta[name="csrf-token"]').attr('content');
                swal({
                        title: "ต้องการส่งคืนหรือไม่",
                        text: "กรุณาตรวจสอบก่อนส่งข้อมูลเพื่อป้องกันการผิดพลาด",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: '/risks/boss/backprogram',
                                data: {
                                    'risk_id': risk_id,
                                    'back_comment': back_comment,
                                    'riskstep_id': riskstep_id,
                                    _token: _token
                                },
                                success: function(data) {
                                    if (data.success) {
                                        $("#modalBackRisk").modal('hide');
                                        window.location.reload();
                                    } else {
                                        swal({
                                            title: "ผิดพลาด!!!",
                                            text: data.error,
                                            icon: "error",
                                            button: "OK",
                                        });
                                    }
                                }
                            });
                        }
                    });
            });

            $(".send_risk").click(function(e) {
                e.preventDefault();
                var risk_id = $(this).data('id');
                var riskstep_id = 4;
                var _token = $('meta[name="csrf-token"]').attr('content');

                if (risk_id == null) {
                    swal({
                        title: "คำเตือน !!!",
                        text: "กรุณาเลือกความเสี่ยงที่จะอนุมัติ",
                        icon: "warning",
                        button: "OK",
                    });
                } else {
                    swal({
                            title: "ต้องการอนุมัติหรือไม่",
                            text: "กรุณาตรวจสอบก่อนอนุมัติเพื่อป้องกันการผิดพลาด",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: "POST",
                                    dataType: "json",
                                    url: '/risks/boss/sendagency',
                                    data: {
                                        'risk_id': risk_id,
                                        'riskstep_id': riskstep_id,
                                        _token: _token
                                    },
                                    success: function(data) {
                                        if (data.success) {
                                            swal({
                                                title: "อนุมัติสำเร็จ",
                                                text: "อนุมัติสำเร็จขอบคุณค่ะ",
                                                icon: "success",
                                                button: false,
                                                timer: 1500,
                                            }).then((willDelete) => {
                                                window.location.reload();
                                            });
                                        } else {
                                            swal({
                                                title: "ผิดพลาด!!!",
                                                text: "error : " + JSON.stringify(
                                                    data),
                                                icon: "error",
                                                button: "OK",
                                            });
                                        }
                                    }
                                });
                            }
                        });
                }
            });
        });

    </script>
@endsection
