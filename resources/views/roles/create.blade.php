@extends('layouts.defaults')
@section('fcss')

@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>เพิ่มบทบาท</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ URL::to('/roles') }}">จัดการบทบาท</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เพิ่มบทบาท</li>
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
                    <h4 class="text-blue h4">เพิ่มบทบาท</h4>
                </div>
            </div>
            <form action="/roles/create" method="POST">
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
                <div class="form-group">
                    <label>ชื่อบทบาทภาษาไทย</label>
                    <input class="form-control" type="text" id="name_th" name="name_th" value="{{ old('name_th') }}"
                        placeholder="กรอกชื่อบทบาทภาษาไทย" required>
                </div>
                <div class="form-group">
                    <label>ชื่อบทบาทภาษาอังกฤษ</label>
                    <input class="form-control" type="text" id="name_en" name="name_en" value="{{ old('name_en') }}"
                        placeholder="กรอกชื่อบทบาทภาษาอังกฤษ" required>
                </div>
                <div class="form-group">
                    <label>ชื่อบทบาท ภาษาอังกฤษ ไม่มีช่องว่าง</label>
                    <input class="form-control" type="text" id="slug" name="slug" value="{{ old('slug') }}"
                        placeholder="บทบาทภาษาอังกฤษ (ไม่มีช่องว่าง)" required>
                </div>
                <div class="form-group">
                    <label>การอนุญาต</label>
                    <select class="selectpicker form-control" id="permission" name="permission[]" data-size="5" multiple
                        data-actions-box="true" required>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name_th }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    {{-- <a href="{{ URL::to('/roles') }}" class="btn btn-danger">ยกเลิก</a> --}}
                    <a href="#" onclick="window.history.back();" class="btn btn-danger"> ยกเลิก</a>
                </div>
            </form>
        </div>
        <!-- Default Basic Forms End -->
    </div>

@endsection
@section('scripts')

@endsection
