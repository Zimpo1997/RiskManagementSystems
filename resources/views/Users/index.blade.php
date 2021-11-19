@extends('layouts.defaults')
@section('fcss')
    <link rel="stylesheet" type="text/css"
        href="{{ URL::to('/') }}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::to('/') }}/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <!-- switchery css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/src/plugins/switchery/switchery.min.css">
@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>จัดการผู้เข้าใช้งาน</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">จัดการผู้เข้าใช้งาน</li>
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
                    {{-- <h4 class="text-blue h4">จัดการผู้เข้าใช้งาน</h4> --}}
                </div>
                <div class="pull-right">
                    @can('create-users')
                        <a href="{{ URL::to('/user/create') }}" class="btn btn-primary btn-sm scroll-click"><i
                                class="fa fa-user-plus"></i> สร้างผู้ใช้งาน</a>
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
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="table-plus datatable-nosort">#</th>
                        <th scope="col">ชื่อเข้าใช้ระบบ</th>
                        <th scope="col">ชื่อ - สกุล</th>
                        <th scope="col" width="70%">บทบาท</th>
                        <th scope="col" width="70%">โปรแกรม</th>
                        <th scope="col">วันที่สร้าง</th>
                        <th scope="col">วันที่อัพเดท</th>
                        @role('admin')
                            <th scope="col">Active</th>
                        @endrole
                        <th scope="col" class="datatable-nosort">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row" class="text-center">{{ $user->id }}</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge rounded-pill bg-info text-white mb-1">{{ $role->name_th }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($user->programs as $program)
                                    <span
                                        class="badge rounded-pill bg-info text-white mb-1">{{ $program->rp_name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">{{ $user->created_at_th }}</td>
                            <td class="text-center">{{ $user->updated_at_th }}</td>
                            @role('admin')
                                <td class="text-center">
                                    <input type="checkbox" data-id="{{ $user->id }}"
                                        {{ $user->active == '1' ? 'checked' : '' }} class="switch-btn toggle-class"
                                        data-size="small" data-color="#28a745" data-secondary-color="#ff3c00" data-on="Active"
                                        data-off="notActive">
                                </td>
                            @endrole
                            <td class="text-center">
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
    <!-- switchery js -->
    <script src="{{ URL::to('/') }}/src/plugins/switchery/switchery.min.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/advanced-components.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/datatable-setting.js"></script>
    </body>
    <script>
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/user/changeActive',
                data: {
                    'status': status,
                    'user_id': user_id,
                    _token: _token
                },
                success: function(data) {
                    if (data.success) {
                        window.location.reload();
                    }
                }
            });
        })
    </script>
@endsection
