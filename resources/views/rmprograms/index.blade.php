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

                                @can('rm_program_back_risk')
                                    <button type="button" id="rm_program_back_risk" class="btn btn-sm mb-1 showModal"
                                        title="ส่งคืนแอดมิน" data-bgcolor="#db4437" data-color="#ffffff" data-toggle="modal"
                                        data-target="#modalBackRisk">
                                        <i class="dw dw-curved-arrow1"></i>
                                    </button>
                                @endcan
                                @can('rm_program_send_risk')
                                    <button type="button" id="rm_program_send_risk"
                                        class="btn btn-sm btn-primary mb-1 showModal" title="ส่งต่อหน่วยงาน" data-toggle="modal"
                                        data-target="#exampleModalCenter" onclick="getIdRisk({{ $risk->id }})">
                                        <i class="dw dw-curve-arrow"></i>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">ส่งคืนความเสี่ยง รหัสเหตุการณ์ : <span
                            id="showRiskID"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="back-risk_id">
                    <fieldset class="border p-2 mb-2">
                        <legend class="w-auto bg-secondary text-white rounded p-2 h4">เหตุผลการส่งคืน</legend>
                        <div class="form-group">
                            <textarea name="back_comment" id="back_comment" cols="30" rows="10"
                                class="form-control"></textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bgcolor="#db4437" data-color="#ffffff"
                        id="btn-backtoadmin"><i class="dw dw-curved-arrow1"></i>
                        ส่งคืน</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="frm-sendAgency" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">เลือกความเสี่ยง รหัสเหตุการณ์ : <span
                                id="showRiskID2"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="select-role">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <input type="hidden" id="risk_id" name="risk_id">
                                <input type="hidden" id="riskstep_id" name="riskstep_id" value="4">
                                <label>กลุ่มงานหลัก <code>*</code></label>
                                <select class="custom-select2 form-control" name="respon_workgroup" id="respon_workgroup"
                                    style="width: 100%; height: 38px;">
                                    <option selected="" disabled>{{ __('gobal.pleaseSelect') }}</option>
                                    @foreach ($workgroups as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <label>หน่วยงานร่วม</label>
                                <select class="custom-select2 form-control" name="mainrisks_agencies_join[]"
                                    id="mainrisks_agencies_join" style="width: 100%; height: 38px;" multiple="multiple">
                                    @foreach ($workgroups as $item)
                                        <optgroup label="{{ $item->name }}">
                                            @foreach ($item->agency as $item1)
                                                <div class="form-group">
                                                    <option value="{{ $item1->id }}">
                                                        {{ $item1->name }}</option>
                                                </div>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                <label>ทีมร่วม / ทีมคร่อมสายงาน</label>
                                <select class="custom-select2 form-control" name="mainrisks_teamrisks_join[]"
                                    id="mainrisks_teamrisks_join" style="width: 100%; height: 38px;" multiple="multiple">
                                    <optgroup label="ทีมร่วม / ทีมคร่อมสายงาน">
                                        @foreach ($teams as $team)
                                            <div class="form-group">
                                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                            </div>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="dw dw-curve-arrow"></i> ส่ง</button>
                    </div>
                </form>
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
        function getIdRisk(id) {
            $("#back-risk_id").val(id);
            $("#risk_id").val(id);
            $("#showRiskID").html(id);
            $("#showRiskID2").html(id);
        }

        $(function() {

            $("#btn-backtoadmin").click(function() {
                var risk_id = $("#back-risk_id").val();
                var back_comment = $("#back_comment").val();
                var riskstep_id = 99;
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
                                url: '/risks/rmprogram/backprogram',
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

            $("#frm-sendAgency").submit(function(e) {
                e.preventDefault();
                var respon_workgroup = $("#respon_workgroup").val();
                if (respon_workgroup == null) {
                    swal({
                        title: "คำเตือน !!!",
                        text: "กรุณาเลือกหน่วยงานที่จะส่งให้แก้ไข",
                        icon: "warning",
                        button: "OK",
                        // timer: 1500,
                    });
                } else {
                    swal({
                            title: "ต้องการส่งหรือไม่",
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
                                    url: '/risks/rmprogram/sendagency',
                                    data: $("#frm-sendAgency").serializeArray(),
                                    success: function(data) {
                                        if (data.success_code == 200) {
                                            $("#exampleModalCenter").modal('hide');
                                            window.location.reload();
                                        } else {
                                            var errors = data.response_message.join('\n');
                                            swal({
                                                title: "ผิดพลาด",
                                                text: errors,
                                                icon: "error",
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
