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
                        <h4>จัดการกลุ่มงาน</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">จัดการกลุ่มงาน</li>
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
                    {{-- <a href="#" class="btn btn-primary btn-sm scroll-click" data-toggle="modal"
                        data-target="#workgroup-createModal" type="button">
                        <i class="fa fa-plus"></i> เพิ่มกลุ่มงาน</a>
                    </a> --}}
                    <a href="#" class="btn btn-primary btn-sm scroll-click" onclick="createWG()" type="button">
                        <i class="fa fa-plus"></i> เพิ่มกลุ่มงาน</a>
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
                        <th scope="col">ชื่อกลุ่มงาน</th>
                        <th scope="col">พันธกิจ</th>
                        <th scope="col">TokenLine</th>
                        <th scope="col">วันที่สร้าง</th>
                        <th scope="col">วันที่อัพเดท</th>
                        <th scope="col" class="datatable-nosort">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workgroups as $workgroup)
                        <tr>
                            <th scope="row" class="text-center">{{ $workgroup->id }}</th>
                            <td>{{ $workgroup->name }}</td>
                            <td>{{ $workgroup->mission->name }}</td>
                            <td>{{ $workgroup->tokenline }}</td>
                            <td class="text-center">{{ $workgroup->created_at_th }}</td>
                            <td class="text-center">{{ $workgroup->updated_at_th }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item text-warning" href="#" data-toggle="modal"
                                            data-target="#workgroup-editModal" type="button"
                                            onclick="editById({{ $workgroup->id }})"><i class="dw dw-edit2"></i>
                                            Edit</a>
                                        <a class="dropdown-item text-danger" href="#" type="button" id="submit_delete"
                                            onclick="deleteById({{ $workgroup->id }})"><i class="dw dw-delete-3"></i>
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
        <div class="modal fade bs-example-modal-lg" id="workgroup-createModal" tabindex="-1" role="dialog"
            aria-labelledby="createModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="createModal">เพิ่มกลุ่มงาน</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="frm_create" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>เลือกพันธกิจ</label>
                                <select class="custom-select2 form-control col-12" id="mission-add" name="mission_id"
                                    required>
                                    <option disabled>{{ __('gobal.pleaseSelect') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ชื่อกลุ่มงาน</label>
                                <input class="form-control" type="text" id="workgroup_name-add" name="workgroup_name"
                                    placeholder="ชื่อกลุ่มงาน" required>
                            </div>
                            <div class="form-group">
                                <label>Token Line</label>
                                <input class="form-control" type="text" id="tokenline-add" name="workgroup_tokenline"
                                    placeholder="Token Line" required>
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
        <div class="modal fade bs-example-modal-lg" id="workgroup-editModal" tabindex="-1" role="dialog"
            aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editModal">แก้ไขกลุ่มงาน</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="frm_update" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>รหัสกลุ่มงาน</label>
                                <input class="form-control" type="text" id="workgroup_id" name="workgroup_id"
                                    placeholder="รหัสกลุ่มงาน" readonly required>
                            </div>
                            <div class="form-group">
                                <label>เลือกพันธกิจ</label>
                                <select class="custom-select2 form-control col-12" id="mission-edit" name="mission"
                                    required>
                                    <option disabled>{{ __('gobal.pleaseSelect') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ชื่อกลุ่มงาน</label>
                                <input class="form-control" type="text" id="workgroup_name-edit" name="workgroup_name"
                                    placeholder="ชื่อกลุ่มงาน" required>
                            </div>
                            <div class="form-group">
                                <label>Token Line</label>
                                <input class="form-control" type="text" id="tokenline-edit" name="workgroup_tokenline"
                                    placeholder="Token Line" required>
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
        var _token = $('meta[name="csrf-token"]').attr('content');

        function createWG() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/workgroups/create',
                success: function(data) {
                    $("#mission-add").select2({
                        width: '100%'
                    });
                    $("#mission-add").empty();
                    $("#mission-add").append(
                        `<option selected disabled>{{ __('gobal.pleaseSelect') }}</option>`);
                    $.each(data, function(i, v) {
                        $("#mission-add").append(`<option value="${v.id}">${v.name}</option>`);
                    });
                    $("#workgroup-createModal").modal('show');
                },
            });
        }

        function editById(id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/workgroups/edit/' + id,
                success: function(data) {
                    $("#workgroup_id").val(data.workgroups.id);
                    $("#workgroup_name-edit").val(data.workgroups.name);
                    $("#tokenline-edit").val(data.workgroups.tokenline);
                    $("#mission-edit").select2({
                        width: '100%'
                    });
                    $("#mission-edit").empty();
                    $("#mission-edit").append(
                        `<option selected disabled>{{ __('gobal.pleaseSelect') }}</option>`);
                    $.each(data.missions, function(i, v) {
                        if (v.id == data.workgroups.mission_id) {
                            $("#mission-edit").append(
                                `<option value="${v.id}" selected>${v.name}</option>`);
                        }
                        $("#mission-edit").append(`<option value="${v.id}" >${v.name}</option>`);
                    });
                    $("#workgroup-editModal").modal('show');
                },
            });
        }

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
                            url: '/workgroups/delete/' + id,
                            success: function(data) {
                                swalFun(data, "ลบข้อมูลสำเร็จ", "ลบข้อมูลสำเร็จขอบคุณค่ะ",
                                    "/workgroups");
                            },
                        });
                    }
                });
        }

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
                        var mission_id = $("#mission-add").val();
                        var workgroup_name = $("#workgroup_name-add").val();
                        var workgroup_tokenline = $("#workgroup_tokenline").val();
                        if (mission_id == "") {
                            swal({
                                title: "กรุณาเลือก",
                                text: "กรุณาเลือกข้อมูล",
                                icon: "warning",
                                button: "OK",
                            });
                        }
                        if (workgroup_name == "") {
                            swal({
                                title: "กรุณากรอก",
                                text: "กรุณากรอกข้อมูล",
                                icon: "warning",
                                button: "OK",
                            });
                        }
                        if (mission_id != "" && workgroup_name != "") {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: '/workgroups/store',
                                data: {
                                    "mission_id": mission_id,
                                    "workgroup_name": workgroup_name,
                                    "workgroup_tokenline": workgroup_tokenline,
                                    _token: _token
                                },
                                success: function(data) {
                                    swalFun(data, "บันทึกสำเร็จ", "บันทึกข้อมูลสำเร็จขอบคุณค่ะ",
                                        "/workgroups");
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
                        var workgroup_id = $("#workgroup_id").val();
                        var mission_id = $("#mission-edit").val();
                        var workgroup_name = $("#workgroup_name-edit").val();
                        var workgroup_tokenline = $("#workgroup_tokenline").val();
                        if (mission_id == "") {
                            swal({
                                title: "กรุณาเลือก",
                                text: "กรุณาเลือกข้อมูล",
                                icon: "warning",
                                button: "OK",
                            });
                        }
                        if (workgroup_name == "") {
                            swal({
                                title: "กรุณากรอก",
                                text: "กรุณากรอกข้อมูล",
                                icon: "warning",
                                button: "OK",
                            });
                        }
                        if (mission_id != "" && workgroup_name != "") {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: '/workgroups/update/' + workgroup_id,
                                // data: $("#frm_update").serializeArray(),
                                data: {
                                    "mission_id": mission_id,
                                    "workgroup_name": workgroup_name,
                                    "workgroup_tokenline": workgroup_tokenline,
                                    _token: _token
                                },
                                success: function(data) {
                                    swalFun(data, "อัพเดทสำเร็จ", "อัพเดทข้อมูลสำเร็จขอบคุณค่ะ",
                                        "/workgroups");
                                },
                            });
                        }
                    }
                });
        });

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
