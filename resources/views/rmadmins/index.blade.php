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
                        <h4>ตรวจสอบความเสี่ยงจากผู้ใช้งาน</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ตรวจสอบความเสี่ยงจากผู้ใช้งาน</li>
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
                                @can('rm_admin_send_risk')
                                    <button type="button" class="btn btn-sm btn-primary mb-1 showModal" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <i class="dw dw-curve-arrow"></i>
                                    </button>
                                @endcan

                                @can('edit-risk')
                                    <a class="btn btn-sm btn-warning mb-1" data-toggle="tooltip" title="แก้ไข"
                                        href="{{ URL::to("/risks/edit/{$risk->id}") }}"><i class="dw dw-edit2"></i></a>
                                @endcan
                                @can('delete-risk')
                                    <a class="btn btn-sm btn-danger mb-1" data-toggle="tooltip" title="ลบ"
                                        onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')"
                                        href="{{ URL::to("/risks/delete/{$risk->id}") }}"><i class="dw dw-delete-3"></i></a>
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
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เลือกความเสี่ยง รหัสเหตุการณ์ : <span
                            id="showRiskID"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="risk_id">
                    <div class="select-role">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach ($programs as $item)
                                <label class="btn mb-1 w-100">
                                    <input type="radio" name="programs" id="program{{ $item->id }}"
                                        value="{{ $item->id }}">
                                    <div class="icon" id="icon{{ $item->id }}">
                                        <img src="{{ URL::to('/') }}/vendors/images/cross.png" alt="">
                                    </div>
                                    <span>{{ $item->id }}</span>
                                    {{ $item->rp_name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-sendprogram"><i class="dw dw-curve-arrow"></i>
                        ส่ง</button>
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

            $("input[name='programs']").click(function() {
                var radioValue = $("input[name='programs']:checked").val();
                if (radioValue) {
                    $("#icon" + radioValue).html(
                        '<img src="http://127.0.0.1:8000/vendors/images/check-mark-green.png" alt="">'
                    );
                }
                var radio = $("input[name='programs']").each(function() {
                    if ($(this).val() != radioValue) {
                        $("#icon" + $(this).val()).html(
                            '<img src="http://127.0.0.1:8000/vendors/images/cross.png" alt="">');
                    }
                });
            });

            $(".showModal").click(function() {
                var row = $(this).closest('tr');
                var rowID = row.attr('id').split('_')[1];
                $("#risk_id").val(rowID);
                $("#showRiskID").html(rowID);
            });

            $("#btn-sendprogram").click(function() {
                var risk_id = $("#risk_id").val();
                var program_id = $("input[name='programs']:checked").val();
                var riskstep_id = 2;
                var _token = $('meta[name="csrf-token"]').attr('content');
                if (program_id == undefined) {
                    swal({
                        title: "คำเตือน !!!",
                        text: "กรุณาเลือกโปรแกรมด้วยค่ะ",
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
                                    url: '/risks/rmadmin/sendprogram',
                                    data: {
                                        'risk_id': risk_id,
                                        'program_id': program_id,
                                        'riskstep_id': riskstep_id,
                                        _token: _token
                                    },
                                    success: function(data) {
                                        $("#exampleModalCenter").modal('hide');
                                        window.location.reload();
                                    }
                                });
                            }
                        });
                }
            });
        });

    </script>
@endsection
