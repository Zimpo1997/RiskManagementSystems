@extends('layouts.defaults')
@section('fcss')

@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>สร้างผู้ใช้งาน</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ URL::to('/users') }}">จัดการผู้เข้าใช้งาน</a></li>
                            <li class="breadcrumb-item active" aria-current="page">สร้างผู้ใช้งาน</li>
                        </ol>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="mb-5">
                <div class="text-center">
                    <h4 class="text-blue h4">สร้างผู้ใช้งาน</h4>
                </div>
            </div>
            <form action="/user/create" method="POST">
                @csrf
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
                <label>ชื่อ - นามสกุล (ภาษาไทย)</label>
                <div class="input-group custom">
                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror"
                        name="fullname" value="{{ old('fullname') }}" required autocomplete="off" autofocus
                        placeholder="{{ __('Full Name') }}">

                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                    @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label>ชื่อเข้าใช้ระบบ</label>
                <div class="input-group custom">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required autocomplete="off"
                        placeholder="{{ __('Username') }}">

                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label>รหัสเข้าใช้ระบบ</label>
                <div class="input-group custom">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" value="" required placeholder="{{ __('Password') }}">

                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-padlock1"></i></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label>ยืนยัน รหัสเข้าใช้ระบบ</label>
                <div class="input-group custom">
                    <input id="cfmpassword" type="password" class="form-control @error('cfmpassword') is-invalid @enderror"
                        name="cfmpassword" value="" required placeholder="{{ __('Confirm Password') }}">

                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-padlock1"></i></span>
                    </div>
                    @error('cfmpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label>บทบาทการเข้าใช้ระบบ</label>
                <div class="input-group custom">
                    <select class="custom-select2 form-control col-12 @error('status') is-invalid @enderror"
                        multiple="multiple" id="status" name="status[]" required>
                        <option disabled>{{ __('gobal.pleaseSelect') }}</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == 2 ? 'selected' : '' }}>
                                {{ $role->name_th }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div id="show_select_program" class="">
                    <label>เลือกโปรแกรมที่รับผิดชอบ</label>
                    <div class="input-group custom">
                        <select class="custom-select2 form-control col-12 @error('userprogram') is-invalid @enderror"
                            multiple="multiple" id="userprogram" name="userprogram[]">
                            <option disabled>{{ __('gobal.pleaseSelect') }}</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}">
                                    {{ $program->rp_name }}</option>
                            @endforeach
                        </select>
                        @error('userprogram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    {{-- <a href="{{ URL::to('/users') }}" class="btn btn-danger">ยกเลิก</a> --}}
                    <a href="#" onclick="window.history.back();" class="btn btn-danger"> ยกเลิก</a>
                </div>
            </form>
        </div>
        <!-- Default Basic Forms End -->
    </div>

@endsection
@section('scripts')
    <script>
        var inc = $("#status").val().includes('4');
        validateProgram(inc);

        $("#status").change(function() {
            var inc = $(this).val().includes('4');
            validateProgram(inc);
        });

        function validateProgram(inc) {
            if (inc) {
                $("#show_select_program").addClass('d-block');
                $("#show_select_program").removeClass('d-none');
                $("#userprogram").select2({
                    width: 'resolve'
                });
                $("#userprogram").prop("disabled", false);
            } else {
                $("#show_select_program").removeClass('d-block');
                $("#show_select_program").addClass('d-none');
                $("#userprogram").prop("disabled", true);
            }
        }
    </script>
@endsection
