@extends('layouts.defaults')
@section('fcss')

@endsection
@section('contents')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>แก้ไขข้ออนุญาต</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <nav aria-label="breadcrumb" role="navigation" class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ URL::to('/roles') }}">จัดการบทบาท</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แก้ไขข้ออนุญาต</li>
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
                    <h4 class="text-blue h4">แก้ไขข้ออนุญาต</h4>
                </div>
            </div>
            <form action="/permissions/edit/{{ $permission->id }}" method="POST">
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
                    <label>ชื่อข้ออนุญาตไทย</label>
                    <input class="form-control" type="text" id="name_th" name="name_th"
                        value="{{ old('name_th') ? old('name_th') : $permission->name_th }}"
                        placeholder="กรอกชื่อข้ออนุญาตไทย" required>
                </div>
                <div class="form-group">
                    <label>ชื่อข้ออนุญาตอังกฤษ</label>
                    <input class="form-control" type="text" id="name_en" name="name_en"
                        value="{{ old('name_en') ? old('name_en') : $permission->name_en }}"
                        placeholder="กรอกชื่อข้ออนุญาตอังกฤษ" required>
                </div>
                <div class="form-group">
                    <label>ชื่อข้ออนุญาต ภาษาอังกฤษ (ไม่มีช่องว่าง)</label>
                    <input class="form-control" type="text" id="slug" name="slug"
                        value="{{ old('slug') ? old('slug') : $permission->slug }}"
                        placeholder="ชื่อข้ออนุญาต ภาษาอังกฤษ (ไม่มีช่องว่าง)" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    <a href="#" onclick="window.history.back();" class="btn btn-danger"> ยกเลิก</a>
                </div>
            </form>
        </div>
        <!-- Default Basic Forms End -->
    </div>

@endsection
@section('scripts')

@endsection
