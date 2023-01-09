@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | الزبائن | تفاصيل الزبون ')
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
                                    <li class="breadcrumb-item active" aria-current="page"> تفاصيل الزبون </li>
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
                        <h4 class="text-blue h4">شاشة تفاصيل الزبون : </h4>
                    </div>
                </div>
                <form>
                    <p class="mb-20">البيانات الشخصية للزبون : </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>إسم الزبون : </label>
                                <input type="text" class="form-control" id="cus_nam" name="cus_nam"
                                    value="{{ $customer->cus_nam }}" placeholder="اكتب اسم الزبون" disabled>
                                {{-- <small class="form-text text-danger">Example help text that remains unchanged.</small> --}}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>العنوان الاول : </label>
                                <input type="text" class="form-control" id="first_address" name="first_address"
                                    class="form-control" value="{{ $customer->first_address }}"
                                    placeholder="اكتب العنوان الخاص بالزبون" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>العنوان الثاني : </label>
                                <input type="text" class="form-control" id="secund_address" name="secund_address"
                                    value="{{ $customer->secund_address }}" placeholder="اكتب الثاني الخاص بالزبون"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>رقم الهاتف : </label>
                                <input type="text" class="form-control" id="phone_num" name="phone_num"
                                    value="{{ $customer->phone_num }}" placeholder="ادخل رقم هاتف الزبون" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>جنسية الزبون : </label>
                                <input type="text" class="form-control" id="nationality" name="nationality"
                                    class="form-control" value="{{ $customer->nationality }}"
                                    placeholder="ادخل جنسية الزبون" disabled>
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
                                    value="{{ $customer->license_num }}" placeholder="ادخل رقم الرخصة" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>مكان الإصدار</label>
                                <input type="text" class="form-control" id="place_of_issue" name="place_of_issue"
                                    class="form-control" value="{{ $customer->place_of_issue }}"
                                    placeholder="ادحل مكان اصدار الرخصة" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>فئة الدم : </label>
                                <input type="text" class="form-control" id="blood_group" name="blood_group"
                                    class="form-control" value="{{ $customer->blood_group }}"
                                    placeholder="ادخل فئة دم الزبون" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تاريخ الإصدار : </label>
                                <input type="date" class="form-control" id="date_of_issue" name="date_of_issue"
                                    value="{{ $customer->date_of_issue }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تاريخ الانتهاء : </label>
                                <input type="date" class="form-control" id="expire_date" name="expire_date"
                                    value="{{ $customer->expire_date }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>نوع الرخصة : </label>
                                <select class="form-control" disabled="">
                                    <option>Disabled select</option>
                                    <option value="general" @if ($customer->type_lic == 'general') selected @endif> عام
                                    </option>
                                    <option value="private" @if ($customer->type_lic == 'private') selected @endif>خاص</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <a href="{{ route('customer.index') }}" class="btn btn-secondary"> رجوع إلى الخلف </a>
                    </div>
                </form>
            </div>
        @stop
