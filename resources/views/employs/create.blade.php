@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | الموظفين | إضافة موظف ')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-100px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> لوحة التحكم </a> </li>
                                    <li class="breadcrumb-item active" aria-current="page"> اضافة الموظف </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-left">

                            <button class="btn btn-secondary" disabled>
                                {{ date('Y-m-d') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form grid Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-right">
                        <h4 class="text-blue h4">شاشة اضافة الموظف : </h4>
                    </div>
                </div>
                <form action="{{ route('employ.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <p class="mb-20">بيانات الموظف : </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>إسم الموظف : </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="اكتب اسم الموظف">
                                @error('name')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>البريد الالكتروني : </label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="اكتب عنوان البريد الالكتروني" value="{{ old('email') }}">

                                @error('email')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>رقم الهاتف : </label>
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="10" minlength="10"
                                    placeholder="اكتب رقم هاتف الموظف" value="{{ old('phone') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                @error('phone')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>عنوان الموظف : </label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="اكتب عنوان الموظف" value="{{ old('address') }}">

                                @error('address')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>كلمة مرور الموظف : </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="اكتب كلمة مرور الموظف" >

                                @error('password')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>اختيار صورة الموظف : </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*"
                                        oninput="pic.src=window.URL.createObjectURL(this.files[0])" name="picture">
                                    <label class="custom-file-label" style="text-align: end;padding-left: 10px;"
                                        for="file-ip-1">أختر ملف</label>
                                </div>

                                @error('picture')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <img id="pic"
                                src="{{ asset('assets/vendors/images/Avatar-Profile-Vector-PNG.png') }}" alt=""
                                style="
                            height: 150px;
                            width: 150px;
                            border-radius: 8px;
                            border: 1px solid #ddd;
                            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        </div>
                    </div>
                    <div style="text-align: center">
                        <a href="{{ route('employ.index') }}" class="btn btn-secondary"> رجوع</a>
                        <button type="submit" class="btn btn-primary"> حفظ </button>
                    </div>
                </form>
            </div>
        @stop
