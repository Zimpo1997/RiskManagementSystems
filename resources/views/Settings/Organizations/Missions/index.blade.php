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
                        <h4>จัดการพันธกิจ</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">จัดการพันธกิจ</li>
                        </ol>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- basic table  Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-right">
                    <a href="#" class="btn btn-primary btn-sm scroll-click" data-toggle="modal"
                        data-target="#mission-createModal" type="button">
                        <i class="fa fa-plus"></i> เพิ่มพันธกิจ</a>
                    </a>
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
            <table class="data-table-role table stripe hover nowrap">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="table-plus datatable-nosort">#</th>
                        <th scope="col">ชื่อพันธกิจ</th>
                        <th scope="col">วันที่สร้าง</th>
                        <th scope="col">วันที่อัพเดท</th>
                        <th scope="col" class="datatable-nosort">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($missions as $mission)
                        <tr>
                            <th scope="row" class="text-center">{{ $mission->id }}</th>
                            <td>{{ $mission->name }}</td>
                            <td class="text-center">{{ $mission->created_at_th }}</td>
                            <td class="text-center">{{ $mission->updated_at_th }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item text-warning" href="#" data-toggle="modal"
                                            data-target="#mission-editModal" type="button"
                                            onclick="getId({{ $mission->id }})"><i class="dw dw-edit2"></i>
                                            Edit</a>
                                        <a class="dropdown-item text-danger" href="#" type="button" id="submit_delete"
                                            onclick="deleteById({{ $mission->id }})"><i class="dw dw-delete-3"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- basic table  End -->
        <!-- Large modal -->
        <div class="modal fade bs-example-modal-lg" id="mission-createModal" tabindex="-1" role="dialog"
            aria-labelledby="createModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="createModal">เพิ่มพันธกิจ</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="frm_create" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>ชื่อพันธกิจ</label>
                                <input class="form-control" type="text" id="mission_name-add" name="mission_name"
                                    placeholder="ชื่อพันธกิจ" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="button" id="submit_createModal"
                            class="btn btn-primary">{{ __('gobal.add') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Large modal -->
        <div class="modal fade bs-example-modal-lg" id="mission-editModal" tabindex="-1" role="dialog"
            aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editModal">แก้ไขพันธกิจ</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="frm_update" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>รหัสพันธกิจ</label>
                                <input class="form-control" type="text" id="mission_id" name="mission_id"
                                    placeholder="รหัสพันธกิจ" readonly required>
                            </div>
                            <div class="form-group">
                                <label>ชื่อพันธกิจ</label>
                                <input class="form-control" type="text" id="mission_name-edit" name="mission_name"
                                    placeholder="ชื่อพันธกิจ" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="button" id="submit_updateModal"
                            class="btn btn-primary">{{ __('gobal.update') }}</button>
                    </div>
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
        $("#submit_createModal").click(function(e) {
            swal({
                    title: "คำเตือน!!!",
                    text: "กรุณาตรวจสอบก่อนบันทึกข้อมูลเพื่อป้องกันการผิดพลาด",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var mission_name = $("#mission_name-add").val();
                        if (mission_name == "") {
                            swal({
                                title: "กรุณากรอก",
                                text: "กรุณากรอกข้อมูล",
                                icon: "warning",
                                button: "OK",
                            });
                        }
                        if (mission_name != "") {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: '/missions/store',
                                data: $("#frm_create").serializeArray(),
                                success: function(data) {
                                    swalFun(data, "บันทึกสำเร็จ", "บันทึกข้อมูลสำเร็จขอบคุณค่ะ",
                                        "/missions");
                                },
                            });
                        }
                    }
                });
        });

        $("#submit_updateModal").click(function(e) {
            swal({
                    title: "คำเตือน!!!",
                    text: "กรุณาตรวจสอบก่อนบันทึกข้อมูลเพื่อป้องกันการผิดพลาด",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var mission_id = $("#mission_id").val();
                        var mission_name = $("#mission_name-edit").val();
                        if (mission_name == "") {
                            swal({
                                title: "กรุณากรอก",
                                text: "กรุณากรอกข้อมูล",
                                icon: "warning",
                                button: "OK",
                            });
                        }
                        if (mission_id != "" && mission_name != "") {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: '/missions/update/' + mission_id,
                                data: $("#frm_update").serializeArray(),
                                success: function(data) {
                                    swalFun(data, "อัพเดทสำเร็จ", "อัพเดทข้อมูลสำเร็จขอบคุณค่ะ",
                                        "/missions");
                                },
                            });
                        }
                    }
                });
        });

        function deleteById(id) {
            swal({
                    title: "คำเตือน!!!",
                    text: "กรุณาตรวจสอบก่อนลบข้อมูลเพื่อป้องกันความผิดพลาด",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '/missions/delete/' + id,
                            success: function(data) {
                                swalFun(data, "ลบข้อมูลสำเร็จ", "ลบข้อมูลสำเร็จขอบคุณค่ะ",
                                    "/missions");
                            },
                        });
                    }
                });
        }

        function getId(id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/missions/edit/' + id,
                success: function(data) {
                    $('#mission_id').val(data.id);
                    $('#mission_name-edit').val(data.name);
                },
            });
        }

        function swalFun(data, strTitle, strText, path) {
            if (data.success) {
                swal({
                    title: strTitle,
                    text: strText,
                    icon: "success",
                    button: false,
                    timer: 1500,
                }).then((willDelete) => {
                    window.location.href = path;
                });
            } else {
                swal({
                    title: "ผิดพลาด!!!",
                    text: JSON.stringify(data),
                    icon: "error",
                    button: "OK",
                });
            }
        }
    </script>

@endsection
