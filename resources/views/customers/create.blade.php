@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | الزبائن | إضافة زبون ')
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
                                    <li class="breadcrumb-item active" aria-current="page"> إضافة زبون </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-left">

                            <button class="btn btn-secondary">
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
                        <h4 class="text-blue h4">شاشة اضافة الزبون : </h4>
                    </div>
                </div>
                <form action="{{ route('customer.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <p class="mb-20">البيانات الشخصية للزبون : </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>إسم الزبون : </label>
                                <input type="text" class="form-control" id="cus_nam" name="cus_nam"
                                    placeholder="اكتب اسم الزبون">

                                @error('cus_nam')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>العنوان الاول : </label>
                                <input type="text" class="form-control" id="first_address" name="first_address"
                                    class="form-control" placeholder="اكتب العنوان الخاص بالزبون"
                                    value="{{ old('first_address') }}">
                                @error('first_address')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>العنوان الثاني : </label>
                                <input type="text" class="form-control" id="secund_address" name="secund_address"
                                    placeholder="اكتب العنوان الثاني الخاص بالزبون" value="{{ old('secund_address') }}">
                                @error('secund_address')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>رقم الهاتف : </label>
                                <input type="text" class="form-control" id="phone_num" name="phone_num"
                                    placeholder="ادخل رقم هاتف الزبون" maxlength="10" minlength="10"
                                    value="{{ old('phone_num') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('phone_num')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>جنسية الزبون : </label>
                                <input type="text" class="form-control" id="nationality" name="nationality"
                                    class="form-control" placeholder="ادخل جنسية الزبون" value="{{ old('nationality') }}">
                                @error('nationality')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <p class="mb-20">بيانات رخصة الزبون : </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>رقم الرخصة : </label>
                                <input type="text" class="form-control" id="license_num" name="license_num"
                                    maxlength="16" minlength="16" placeholder="ادخل رقم الرخصة"
                                    value="{{ old('license_num') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('license_num')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>مكان الإصدار</label>
                                <input type="text" class="form-control" id="place_of_issue" name="place_of_issue"
                                    class="form-control" placeholder="ادخل مكان اصدار الرخصة"
                                    value="{{ old('place_of_issue') }}">
                                @error('place_of_issue')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>فئة الدم : </label>
                                <input type="text" class="form-control" id="blood_group" name="blood_group"
                                    class="form-control" placeholder="ادخل فئة دم الزبون"
                                    value="{{ old('blood_group') }}">
                                @error('blood_group')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تاريخ الإصدار : </label>
                                <input type="date" class="form-control" id="date_of_issue" name="date_of_issue"
                                    value="{{ old('date_of_issue') }}">
                                @error('date_of_issue')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تاريخ الانتهاء : </label>
                                <input type="date" class="form-control" id="expire_date" name="expire_date"
                                    value="{{ old('expire_date') }}">
                                @error('expire_date')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>نوع الرخصة : </label>
                                <select class="form-control" id="type_lic" name="type_lic">

                                    <option value="private">خاص</option>
                                    <option value="general"> عام </option>
                                </select>
                                @error('type_lic')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <a href="{{ route('customer.index') }}" class="btn btn-secondary"> رجوع</a>
                        <button type="submit" class="btn btn-primary"> حفظ </button>
                    </div>
                </form>
            </div>
        @stop
