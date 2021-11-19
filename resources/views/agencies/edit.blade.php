@extends('layouts.defaults')
@section('fcss')
    <link href="{{ URL::to('/') }}/src/plugins/filepond/dist/filepond.css" rel="stylesheet">
@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>แก้ไขอุบัติการณ์</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แก้ไขอุบัติการณ์</li>
                        </ol>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <fieldset class="border p-2 mb-2">
                <legend class="w-auto bg-success text-white rounded p-2 h6">ข้อมูลอุบัติการณ์</legend>
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label>หัวข้อเรื่อง / เหตุการณ์</label>
                            <input type="text" class="form-control" disabled
                                value="{{ $mainrisk->risksubject->id }} : {{ $mainrisk->risksubject->name_th }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="">วันที่เกิดเหตุ</label>
                            <input type="text" class="form-control" disabled value="{{ $mainrisk->isdate }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="">เวลาที่เกิดเหตุ</label>
                            <input type="text" class="form-control" disabled value="{{ $mainrisk->istime }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">สถานที่เกิดเหตุ</label>
                            <input type="text" class="form-control" disabled
                                value="{{ $mainrisk->riskepoint->id }} : {{ $mainrisk->riskepoint->name }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label for="">ระดับความรุนแรง</label>
                            <input type="text" class="form-control" disabled
                                value="{{ $mainrisk->riskseverities->name }} : {{ $mainrisk->riskseverities->slug }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">รายละเอียดเหตุการณ์</label>
                            <textarea class="form-control" cols="30" rows="10"
                                disabled>{{ $mainrisk->risk_detail }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">การจัดการเบื้องต้น</label>
                            <textarea class="form-control" cols="30" rows="10"
                                disabled>{{ $mainrisk->risk_inmanage }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="">หมายเหตุ</label>
                            <textarea class="form-control" cols="30" rows="10"
                                disabled>{{ $mainrisk->risk_note }}</textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border p-2 mb-2">
                <legend class="w-auto bg-success text-white rounded p-2 h6">กลุ่มงานที่แก้ไข</legend>
                @if ($mainrisk->respon_workgroup)
                    {{ $mainrisk->respon_workgroup->name }}
                @endif
            </fieldset>
            <div class="row">
                @if (count($mainrisk->agencies_join) > 0)
                    <div class="col-md-6">
                        <fieldset class="border p-2 mb-2">
                            <legend class="w-auto bg-success text-white rounded p-2 h6">หน่วยงานงานที่ร่วมแก้ไข</legend>
                            @foreach ($mainrisk->agencies_join as $item)
                                {{ $item->name }}
                            @endforeach
                        </fieldset>
                    </div>
                @endif
                @if (count($mainrisk->teamrisks_join) > 0)
                    <div class="col-md-6">
                        <fieldset class="border p-2 mb-2">
                            <legend class="w-auto bg-success text-white rounded p-2 h6">ทีมที่ร่วมแก้ไข</legend>
                            @foreach ($mainrisk->teamrisks_join as $item)
                                {{ $item->name }}
                            @endforeach
                        </fieldset>
                    </div>
                @endif
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
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/risks/agency/update" id="frm-agencyeditrisk" enctype="multipart/form-data" method="post">
                @csrf
                <input type="hidden" name="risk_id" value="{{ $mainrisk->id }}">
                <input type="hidden" name="riskstep_id" value="5">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="">สรุปประเด็นการจัดการแก้ไขปัญหา <code>*</code></label>
                            <textarea class="form-control" id="risk_solutions" name="risk_solutions" style="height: 100px;"
                                required></textarea>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <div class="user-image mb-3 text-center">
                        <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
                            <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
                        </div>
                    </div>
                    <label for="">เอกสารประกอบ เช่น วาระการประชุม อื่นๆ <code>*PDF</code></label>
                    <input type="file">
                    <div class="custom-file">
                        <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile">
                        <label class="custom-file-label" for="chooseFile">Select file</label>
                    </div>
                </div> --}}
                <label>เอกสารประกอบ เช่น วาระการประชุม อื่นๆ <code> *PDF และขนาดต้องน้อยกว่า 2,048 KB</code></label>
                {{-- <input type="file" class="filepond" id="fileUpload" name="fileUpload" data-allow-reorder="true"
                    data-max-file-size="3MB" data-max-files="1"> --}}
                <div class="custom-file mb-3">
                    <input type="file" name="fileUpload" class="custom-file-input" id="fileUpload">
                    <label class="custom-file-label" for="fileUpload">เลือกไฟล์</label>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><i class="dw dw-diskette1"></i>
                                บันทึกข้อมูล</button>
                            <a href="#" onclick="window.history.back();" class="btn btn-danger"><i class="dw dw-cancel"></i>
                                ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ URL::to('/') }}/src/plugins/filepond/dist/filepond.js"></script>
    <script>
        $(function() {
            // const inputElement = document.querySelector('input[id="fileUpload"]');
            // const pond = FilePond.create(inputElement);

            // FilePond.setOptions({
            //     labelIdle: "กรุณาเลือกไฟล์ คลิก หรือ ลางวาง",
            // server: {
            //     url: '/upload',
            //     headers: {
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     }
            // }
            // });

            // function readURL(input) {
            //     console.log(input);
            //     if (input.files && input.files[0]) {
            //         var reader = new FileReader();
            //         reader.onload = function(e) {
            //             $('#imgPlaceholder').attr('src', e.target.result);
            //         }
            //         reader.readAsDataURL(input.files[0]);
            //     }
            // }

            $("#fileUpload").change(function() {
                // readURL(this);
                var fileName = $(this).val();
                $(this).next('.custom-file-label').html(fileName);
            });

            $("#frm-agencyeditrisk").submit(function(e) {
                e.preventDefault();
                swal({
                        title: "ต้องการส่งหรือไม่",
                        text: "กรุณาตรวจสอบก่อนส่งข้อมูลเพื่อป้องกันการผิดพลาด",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            e.currentTarget.submit();
                            // $.ajax({
                            //     type: "POST",
                            //     dataType: "json",
                            //     url: '/risks/agency/update',
                            //     data: $("#frm-agencyeditrisk").serializeArray(),
                            //     success: function(data) {
                            //         console.log(data);
                            //         // $("#exampleModalCenter").modal('hide');
                            //         // window.location.reload();
                            //     }
                            // });
                        }
                    });
            });
        });

    </script>
@endsection
