@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | العقودات | تفاصيل العقد ')
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
                                    <li class="breadcrumb-item active" aria-current="page"> تفاصيل العقد </li>
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
                        <h4 class="text-blue h4">شاشة بيانات العقد : </h4>
                    </div>
                </div>
                <p class="mb-20">البيانات الاساسية للمستأجر : </p>
                <hr>
                <div class="row">

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>إسم المستاجر : </label>
                            <input type="text" class="cost_of_day form-control" disabled
                                value="{{ $contract->customer->cus_nam }}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>إسم السيارة : </label>
                            <input type="text" class="cost_of_day form-control" disabled
                                value="{{ $contract->car->car_name }}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label> السائق : </label>
                            <input type="text" class="cost_of_day form-control" disabled
                                @if ($contract->driver_id == 0) value="{{ __('بدون سائق') }}"
                                @else
                                value="{{ $contract->driver->driver_nam }}" @endif>
                        </div>
                    </div>
                </div>
                <p class="mb-20">بيانات السيارة المختارة : </p>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName" class="control-label">موديل السيارة : </label>
                            <input type="text" class="model form-control" disabled value="{{ $contract->car->model }}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName" class="control-label ">تكلفة إيجار اليوم : </label>
                            <input type="text" class="cost_of_day form-control" disabled
                                value="{{ $contract->car->cost_of_day }}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName" class="control-label">سعر ايجار الشهر : </label>
                            <input type="text" class="price form-control" disabled value="{{ $contract->car->price }}">
                        </div>
                    </div>
                </div>
                <p class="mb-20">بيانات الايجار : </p>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>تاريخ البداية : </label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                class="form-control" placeholder="اكتب العنوان الخاص بالعقد" disabled
                                value="{{ $contract->start_date }}">

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>تاريخ النهاية : </label>
                            <input type="date" class="form-control" id="end_date" name="end_date" class="form-control"
                                placeholder="اكتب العنوان الخاص بالعقد" disabled value="{{ $contract->end_date }}">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>اسم الولاية : </label>
                            <input type="text" class="form-control" id="state" name="state" class="form-control"
                                placeholder="اكتب العنوان الخاص بالعقد" disabled value="{{ $contract->state }}">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>تفاصيل العقد : </label>
                            <textarea class="form-control" id="details" rows="5" cols="20" name="details" style="height: 45px;"
                                placeholder="تفاصيل عقد الايجار" disabled> {{ $contract->details }}</textarea>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="inputName" class="control-label "> الدفع عبر : </label>
                            @if ($contract->bank_id == 0)
                                <input type="text" class="cost_of_day form-control" disabled value="طريقة اخرى">
                            @else
                                <input type="text" class="cost_of_day form-control" disabled
                                    value="{{ $contract->bank->bank_name }}">
                            @endif
                        </div>
                    </div>

                    @if ($contract->bank_id > 0)
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label ">رقم الحساب : </label>
                                <input type="text" class="form-control" name="account_number" readonly
                                 value="{{ $contract ->account_number  }}" placeholder="1234 4444 6666 7777" maxlength="16" minlength="16"
                                 >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label ">  كود التحويل : </label>
                                <input type="text" class="form-control" name="secret_code" readonly
                                value="{{ $contract ->secret_code  }}" placeholder="4545" maxlength="4" minlength="4">
                            </div>
                        </div>
                    @endif
                </div>

                <div style="text-align: center">
                    <a href="{{ route('contract.index') }}" class="btn btn-secondary"> رجوع</a>
                </div>
            </div>
        @stop
