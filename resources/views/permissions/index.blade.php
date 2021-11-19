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
                        <h4>จัดการข้ออนุญาต</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">จัดการข้ออนุญาต</li>
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
                    <a href="{{ URL::to('/permissions/create') }}" class="btn btn-primary btn-sm scroll-click"><i
                            class="fa fa-user-plus"></i> เพิ่มข้ออนุญาต</a>
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
                        <th scope="col">ชื่ออนุญาติไทย</th>
                        <th scope="col">ชื่ออนุญาติอังกฤษ</th>
                        <th scope="col">Slug</th>
                        <th scope="col">วันที่สร้าง</th>
                        <th scope="col">วันที่อัพเดท</th>
                        <th scope="col" class="datatable-nosort">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <th scope="row" class="text-center">{{ $permission->id }}</th>
                            <td>{{ $permission->name_th }}</td>
                            <td>{{ $permission->name_en }}</td>
                            <td>{{ $permission->slug }}</td>
                            <td class="text-center">{{ $permission->created_at_th }}</td>
                            <td class="text-center">{{ $permission->updated_at_th }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-warning"
                                    href="{{ URL::to("/permissions/edit/{$permission->id}") }}"><i
                                        class="dw dw-edit2"></i></a>
                                <a class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')"
                                    href="{{ URL::to("/permissions/delete/{$permission->id}") }}"><i
                                        class="dw dw-delete-3"></i></a>
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
