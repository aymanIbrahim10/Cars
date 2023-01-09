@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | الموظفين | تعديل بياناتي ')
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
                                    <li class="breadcrumb-item active" aria-current="page"> تعديل البيانات </li>
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
            <div class="card-box mb-30 height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tasks" role="tab">البيانات
                                    العامة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#setting" role="tab">البيانات الخصوصية</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Tasks Tab start -->
                            <div class="tab-pane fade show active" id="tasks" role="tabpanel">
                                <div class="pd-20 profile-task-wrap">
                                    <form action="{{ route('employ.update', $employs->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <p class="mb-20">بيانات الشخصية : </p>
                                        <hr>
                                        <div style="text-align: center;">
                                            @if ($employs->picture == '')
                                                <img id="pic"
                                                    src="{{ asset('assets/vendors/images/Avatar-Profile-Vector-PNG.png') }}"
                                                    alt=""
                                                    style="height: 200px;width: 200px;border-radius: 50%;border: 1px solid #ddd;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                            @else
                                                <img id="pic" src="{{ asset($employs->picture) }}" alt=""
                                                    style="height: 200px;width: 200px;border-radius: 50%;border: 1px solid #ddd;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                            @endif

                                            <div class="form-group">
                                                <label>اختيار صورة الموظف : </label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" accept="image/*"
                                                        oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                                        name="picture" value="{{ $employs->picture }}">
                                                    <label class="custom-file-label"
                                                        style="text-align: end;padding-left: 10px;" for="file-ip-1">أختر
                                                        ملف</label>
                                                </div>
                                                @error('picture')
                                                    <span class="form-text text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>الاسم : </label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="اكتب اسم الموظف" value="{{ $employs->name }}">
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
                                                        placeholder="اكتب عنوان البريد الالكتروني"
                                                        value="{{ $employs->email }}">
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
                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                        placeholder="اكتب رقم هاتف الموظف" value="{{ $employs->phone }}">
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
                                                        placeholder="اكتب عنوان الموظف" value="{{ $employs->address }}">
                                                    @error('address')
                                                        <span class="form-text text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div style="text-align: center">
                                            <a href="{{ route('employ.index') }}" class="btn btn-secondary"> رجوع</a>
                                            <button type="submit" class="btn btn-primary"> حفظ </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Tasks Tab End -->
                            <!-- Setting Tab start -->
                            <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                                <div class="pd-20 profile-task-wrap">
                                    <form action="{{ route('change_password', $employs->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>كلمة المرور القديمة : </label>
                                                    <input type="password" class="form-control" id="oldpassword"
                                                        name="oldpassword" placeholder="اكتب كلمة المرور الخاص بك">

                                                    @error('oldpassword')
                                                        <span class="form-text text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>كلمة المرور الجديد : </label>
                                                    <input type="password" class="form-control" id="newpassword"
                                                        name="newpassword"
                                                        placeholder="اكتب كلمة المرور الجديد الخاصة بك">

                                                    @error('newpassword')
                                                        <span class="form-text text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>تاكيد كلمة المرور : </label>
                                                    <input type="password" class="form-control"
                                                        id="password_confirmation" name="password_confirmation"
                                                        placeholder="تاكيد كلمة المرور الخاص بك">

                                                    @error('password_confirmation')
                                                        <span class="form-text text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div style="text-align: center">
                                            <a href="{{ route('employ.index') }}" class="btn btn-secondary"> رجوع</a>
                                            <button type="submit" class="btn btn-primary"> حفظ </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Setting Tab End -->
                        </div>
                    </div>
                </div>
            </div>
        @stop
        @section('script')
            @include('alerts.errors')
            @include('alerts.success')
        @stop
