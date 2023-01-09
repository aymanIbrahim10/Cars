@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | السيارات | إضافة سيارة ')
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
                                    <li class="breadcrumb-item active" aria-current="page"> اضافة السيارة </li>
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
                        <h4 class="text-blue h4">شاشة اضافة السيارة : </h4>
                    </div>
                </div>
                <form action="{{ route('car.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <p class="mb-20">بيانات السيارة : </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>إسم السيارة : </label>
                                <input type="text" class="form-control" id="car_name" name="car_name"
                                    value="{{ old('car_name') }}" placeholder="اكتب اسم السيارة">
                                @error('car_name')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>موديل السيارة : </label>
                                <input type="text" class="form-control" id="model" name="model"
                                    class="form-control" placeholder="اكتب الموديل الخاص بالسيارة"
                                    value="{{ old('model') }}">
                                @error('model')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>رقم اللوحة : </label>
                                <input type="text" class="form-control" id="plate_num" name="plate_num"
                                    placeholder="اكتب رقم اللوحة الخاص بالسيارة" value="{{ old('plate_num') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('plate_num')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>نوع المحرك : </label>
                                <input type="text" class="form-control" id="engin_type" name="engin_type"
                                    placeholder="ادخل نوع محرك السيارة" value="{{ old('engin_type') }}">
                                @error('engin_type')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>عداد المسافة : </label>
                                <input type="text" class="form-control" id="odo_meter" name="odo_meter"
                                    class="form-control" placeholder="ادخل عداد المسافة" value="{{ old('odo_meter') }}">
                                @error('odo_meter')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>تكلفة الايجار : </label>
                                <input type="text" class="form-control" id="cost_of_day" name="cost_of_day"
                                    class="form-control" placeholder="ادخل تكلفة  ايجار اليوم الواحد للسيارة"
                                    value="{{ old('cost_of_day') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('cost_of_day')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>سعر السيارة : </label>
                                <input type="text" class="form-control" id="price" name="price"
                                    class="form-control" placeholder="ادخل سعر السيارة مثلا 50 لخمسين مليون"
                                    value="{{ old('price') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('price')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <a href="{{ route('car.index') }}" class="btn btn-secondary"> رجوع</a>
                        <button type="submit" class="btn btn-primary"> حفظ </button>
                    </div>
                </form>
            </div>
        @stop
