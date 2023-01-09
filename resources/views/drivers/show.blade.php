@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | السائقين | تفاصيل السائق ')
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
                                    <li class="breadcrumb-item active" aria-current="page"> تفاصيل السائق </li>
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
                        <h4 class="text-blue h4">شاشة تفاصيل السائق : </h4>
                    </div>
                </div>
                <form>
                    <p class="mb-20">البيانات الشخصية للسائق : </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>إسم السائق : </label>
                                <input type="text" class="form-control" id="driver_nam" name="driver_nam"
                                    value="{{ $driver->driver_nam }}" placeholder="اكتب اسم السائق" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>العنوان الاول : </label>
                                <input type="text" class="form-control" id="driver_first_address"
                                    name="driver_first_address" class="form-control"
                                    value="{{ $driver->driver_first_address }}" placeholder="اكتب العنوان الخاص بالسائق"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>العنوان الثاني : </label>
                                <input type="text" class="form-control" id="driver_secund_address"
                                    name="driver_secund_address" value="{{ $driver->driver_secund_address }}"
                                    placeholder="اكتب الثاني الخاص بالسائق" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>رقم الهاتف : </label>
                                <input type="text" class="form-control" id="phone_num" name="phone_num"
                                    value="{{ $driver->phone_num }}" placeholder="ادخل رقم هاتف السائق" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>جنسية السائق : </label>
                                <input type="text" class="form-control" id="nationality" name="nationality"
                                    class="form-control" value="{{ $driver->nationality }}"
                                    placeholder="ادخل جنسية السائق" disabled>
                            </div>
                        </div>

                    </div>
                    <p class="mb-20">بيانات رخصة السائق : </p>
                    <hr>
                    <div class="row">

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>رقم الرخصة : </label>
                                <input type="text" class="form-control" id="license_num" name="license_num"
                                    value="{{ $driver->license_num }}" placeholder="ادخل رقم الرخصة" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>مكان الإصدار</label>
                                <input type="text" class="form-control" id="place_of_issue" name="place_of_issue"
                                    class="form-control" value="{{ $driver->place_of_issue }}"
                                    placeholder="ادخل مكان اصدار الرخصة" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>فئة الدم : </label>
                                <input type="text" class="form-control" id="blood_group" name="blood_group"
                                    class="form-control" value="{{ $driver->blood_group }}"
                                    placeholder="ادخل فئة دم السائق" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تاريخ الإصدار : </label>
                                <input type="date" class="form-control" id="date_of_issue" name="date_of_issue"
                                    value="{{ $driver->date_of_issue }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تاريخ الانتهاء : </label>
                                <input type="date" class="form-control" id="expire_date" name="expire_date"
                                    value="{{ $driver->expire_date }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>نوع الرخصة : </label>
                                <select class="form-control" disabled="">
                                    <option>Disabled select</option>
                                    <option value="general" @if ($driver->type_lic == 'general') selected @endif> عام
                                    </option>
                                    <option value="private" @if ($driver->type_lic == 'private') selected @endif>خاص</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <a href="{{ route('driver.index') }}" class="btn btn-secondary"> رجوع إلى الخلف </a>
                    </div>
                </form>
            </div>
        @stop
