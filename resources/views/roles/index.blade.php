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
                        <h4>จัดการบทบาท</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">จัดการบทบาท</li>
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
                    <a href="{{ URL::to('/roles/create') }}" class="btn btn-primary btn-sm scroll-click"><i
                            class="fa fa-user-plus"></i> เพิ่มบทบาท</a>
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
                        <th scope="col">ชื่อบทบาทไทย</th>
                        <th scope="col">Slug</th>
                        <th scope="col" width="70%">การอนุญาติ</th>
                        <th scope="col">วันที่สร้าง</th>
                        <th scope="col">วันที่อัพเดท</th>
                        <th scope="col" class="datatable-nosort">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row" class="text-center">{{ $role->id }}</th>
                            <td>{{ $role->name_th }}</td>
                            <td>{{ $role->slug }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span
                                        class="badge rounded-pill bg-info text-white mb-1">{{ $permission->name_th }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">{{ $role->created_at_th }}</td>
                            <td class="text-center">{{ $role->updated_at_th }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item text-warning"
                                            href="{{ URL::to("/roles/edit/{$role->id}") }}"><i class="dw dw-edit2"></i>
                                            Edit</a>
                                        <a class="dropdown-item text-danger"
                                            onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')"
                                            href="{{ URL::to("/roles/delete/{$role->id}") }}"><i
                                                class="dw dw-delete-3"></i>
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
    </div>

@endsection
@section('scripts')
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="{{ URL::to('/') }}/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/datatable-setting.js"></script>
@endsection
