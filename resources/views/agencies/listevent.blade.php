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
                        <h4>รายการความเสี่ยงของหน่วยงาน</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายการความเสี่ยงของหน่วยงาน</li>
                        </ol>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- basic table  Start -->
        <div class="pd-20 card-box mb-30">
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th width="10%">ลำดับ</th>
                        <th>รายการ</th>
                        @foreach ($severities as $severitie)
                            <th>{{ $severitie->name }}</th>
                        @endforeach
                        <th width="5%">รวม</th>
                        <th width="5%">คิดเป็น</th>
                    </tr>
                </thead>
                @php
                    $sumN = 0;
                    $sumS = 0;
                @endphp
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>CSD111 : แผลถอนฟันหายช้าและติดเชื้อ ในผู้ป่วย HIV\/ Immunosuppressive\/ On steroid</td>
                        @foreach ($severities as $severitie)
                            <td>10/10</td>
                        @endforeach
                        <td>100/100</td>
                        <td>100%</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-center">รวมแยกระดับความรุนแรง</td>
                        @foreach ($severities as $severitie)
                            <td>10/10</td>
                        @endforeach
                        <td>100/100</td>
                        <td>100%</td>
                    </tr>
                </tfoot>
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
    <script src="{{ URL::to('/') }}/vendors/scripts/datatable-listevent.js"></script>
@endsection
