@extends('layouts.defaults')
@section('fcss')
@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>จัดการข้อมูลบุคคลากร</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลบุคคลากร</li>
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
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            Upload Validation Error<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ URL::to('settings/generals/member/import') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="select_file" name="select_file">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Upload</button>
                                <button type="button" class="btn btn-outline-info rounded-right" data-toggle="modal"
                                    data-target="#exampleModalCenter" data-content=" title,fname,lname,cid,"
                                    title="คำแนะนำ">
                                    <i class="icon-copy dw dw-warning"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"> คำแนะนำ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="model-title">การอัพโหลดไฟล์ข้อมูล
                                                    ภายในไฟล์จะต้องมีหัวตารางดังนี้
                                                </div>
                                                <ul class="list-group">
                                                    <li class="list-group-item">title <span
                                                            class="float-right">(คำนำหน้า)</span></li>
                                                    <li class="list-group-item">fname <span
                                                            class="float-right">(ชื่อ)</span></li>
                                                    <li class="list-group-item">lname <span
                                                            class="float-right">(นามสกุล)</span></li>
                                                    <li class="list-group-item">card_number <span
                                                            class="float-right">(เลขบัตรประชาชน)</span></li>
                                                    <li class="list-group-item">birthday <span
                                                            class="float-right">(วันเดือนปีเกิด เป็น ค.ศ.)</span></li>
                                                    <li class="list-group-item">sex <span class="float-right">(เพศ)</span>
                                                    </li>
                                                    <li class="list-group-item">tel <span
                                                            class="float-right">(เบอร์โทร)</span></li>
                                                    <li class="list-group-item">position <span
                                                            class="float-right">(ตำแหน่ง)</span></li>
                                                    <li class="list-group-item">degree <span
                                                            class="float-right">(ระดับการทำงาน)</span></li>
                                                    <li class="list-group-item">add_home <span
                                                            class="float-right">(บ้านเลขที่)</span></li>
                                                    <li class="list-group-item">add_road <span
                                                            class="float-right">(ถนน)</span></li>
                                                    <li class="list-group-item">add_moo <span
                                                            class="float-right">(หมู่)</span></li>
                                                    <li class="list-group-item">add_district <span
                                                            class="float-right">(ตำบล)</span></li>
                                                    <li class="list-group-item">add_amphure <span
                                                            class="float-right">(อำเภอ)</span></li>
                                                    <li class="list-group-item">add_province <span
                                                            class="float-right">(จังหวัด)</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="pull-right">
                    @can('create-users')
                        <a href="{{ URL::to('/user/create') }}" class="btn btn-primary btn-sm scroll-click"><i
                                class="fa fa-user-plus"></i> เพิ่มบุคคลากร</a>
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
                        <th scope="col">ชื่อ - สกุล</th>
                        <th scope="col">เลขบัตรประชาชน</th>
                        <th scope="col">วัน เดือน ปีเกิด</th>
                        <th scope="col">เบอร์โทร</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col">ระดับ</th>
                        <th scope="col" class="datatable-nosort">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <th scope="row" class="text-center">{{ $member->id }}</th>
                            <td>{{ $member->title }} {{ $member->fname }} {{ $member->lname }}</td>
                            <td>{{ $member->card_number }}</td>
                            <td>{{ $member->birthday }}</td>
                            <td>{{ $member->tel }}</td>
                            <td>{{ $member->sex }}</td>
                            <td>{{ $member->position }}</td>
                            <td>{{ $member->degree }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        @can('show-member')
                                            <a class="dropdown-item text-info" href="#"><i class="dw dw-eye"></i> View</a>
                                        @endcan
                                        @can('edit-member')
                                            <a class="dropdown-item text-warning"
                                                href="{{ URL::to("/user/edit/{$member->id}") }}"><i class="dw dw-edit2"></i>
                                                Edit</a>
                                        @endcan
                                        @can('delete-member')
                                            <a class="dropdown-item text-danger"
                                                onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')"
                                                href="{{ URL::to("/user/delete/{$member->id}") }}"><i
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
@endsection
