@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | البنوك | إضافة بنك ')
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
                                    <li class="breadcrumb-item active" aria-current="page"> اضافة البنك </li>
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
                        <h4 class="text-blue h4">شاشة اضافة البنك : </h4>
                    </div>
                </div>
                <form action="{{ route('bank.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <p class="mb-20">بيانات  البنك : </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>إسم البنك : </label>
                                <input type="text" class="form-control" id="bank_name"
                                name="bank_name"
                                placeholder="اكتب اسم البنك" >

                                @error('bank_name')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>طريقة الدفع : </label>
                                <select class="custom-select2 form-control" multiple="multiple" style="width: 100%;" id="payment_method" name="payment_method[]" >
                                    <optgroup label="أدخل طريقة الدفع الذي يوفره البنك">
                                    <option value="cash">نقدي</option>
                                        <option value="electronic">إلكتروني</option>
                                    </optgroup>
                                </select>
                                @error('payment_method')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                        </div> --}}
                        <div class="col-md-6 col-sm-12 d-flex">
                            <label class="weight-600">طريقة الدفع : </label>
                            <div class="custom-control custom-checkbox mb-5 col-md-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1-1" name="payment_method[]" value="نقدي">
                                <label class="custom-control-label" for="customCheck1-1">نقدي</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-5 col-md-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck2-1" name="payment_method[]" value="إلكتروني">
                                <label class="custom-control-label" for="customCheck2-1" name="payment_method[]">إلكتروني</label>
                            </div>
                            @error('payment_method')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div style="text-align: center">
                        <a href="{{ route('bank.index') }}" class="btn btn-secondary"> رجوع</a>
                        <button type="submit" class="btn btn-primary"> حفظ </button>
                </div>
                </form>
            </div>
@stop

