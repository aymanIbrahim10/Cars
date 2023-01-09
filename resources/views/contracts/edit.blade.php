@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | العقودات | تعديل العقد ')
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
                                    <li class="breadcrumb-item active" aria-current="page"> تعديل العقد </li>
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
                <form action="{{ route('contract.update', $contract->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <p class="mb-20">البيانات الاساسية للمستأجر : </p>
                    <hr>
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>إسم المستاجر : </label>
                                <select name="cus_id" class="form-control custom-select2" id="cus_id"
                                    style="width: 100%; height: 38px;">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}"
                                            @if ($customer->id == $contract->cus_id) selected @endif>
                                            {{ $customer->cus_nam }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('cus_id')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>إسم السيارة : </label>
                                <select name="car_id" class="form-control custom-select2 getcar" id="car_id"
                                    style="width: 100%; height: 38px;">
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}"
                                            @if ($car->id == $contract->car_id) selected @endif>
                                            {{ $car->car_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('car_id')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 d-flex mt-2 mb-5">
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" id="type_div" name="customRadio" class="custom-control-input"
                                    @if ($contract->driver_id == 0) checked @endif>
                                <label class="custom-control-label" for="type_div">بدون سائق</label>
                            </div>

                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" id="type_div2" name="customRadio" class="custom-control-input"
                                    @if ($contract->driver_id !== 0) checked @endif>
                                <label class="custom-control-label" for="type_div2">مع سائق</label>
                            </div>
                            <span class="text-danger">* سيزيد الايجار مع السائق نسبة 2% من السعر الاصلي للايجار</span>
                        </div>
                        <div class="col-md-6 col-sm-12" id="driver_info">
                            <div class="form-group">
                                <label>اسم السائق : </label>
                                <select class="custom-select2 form-control" name="driver_id"
                                    style="width: 100%; height: 38px;">

                                    <optgroup label="اكتب اسم السائق الذي يقود العربيه">
                                        <option value="0" @if ($contract->driver_id == 0) selected @endif>بدون سائق
                                        </option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}"
                                                @if ($driver->id == $contract->driver_id) selected @endif>
                                                {{ $driver->driver_nam }}
                                            </option>
                                        @endforeach


                                    </optgroup>
                                </select>
                                @error('driver_id')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <p class="mb-20">بيانات السيارة المختارة : </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label">موديل السيارة : </label>
                                <input type="text" class="model form-control" disabled
                                    value="{{ $contract->car->model }}">
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
                                <input type="text" class="price form-control" disabled
                                    value="{{ $contract->car->price }}">
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
                                    class="form-control" value="{{ $contract->start_date }}">
                                @error('start_date')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تاريخ النهاية : </label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    class="form-control" value="{{ $contract->end_date }}">
                                @error('end_date')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>اسم الولاية : </label>
                                <select class="custom-select2 form-control" name="state"
                                    style="width: 100%; height: 38px;">
                                    <optgroup label="اكتب اسم الولاية التي ستقوم بقيادة السيارة فيه">
                                        <option value="ولاية الخرطوم" @if ($contract->state == 'ولاية الخرطوم') selected @endif>
                                            ولاية الخرطوم</option>
                                        <option value="ولاية الجزيرة" @if ($contract->state == 'ولاية الجزيرة') selected @endif>
                                            ولاية الجزيرة</option>
                                        <option value="ولاية بورتسودان" @if ($contract->state == 'ولاية بورتسودان') selected @endif>
                                            ولاية بورتسودان</option>
                                        <option value="ولاية كردفان" @if ($contract->state == 'ولاية كردفان') selected @endif>
                                            ولاية كردفان</option>
                                        <option value="ولاية النيل الازرق"
                                            @if ($contract->state == 'ولاية النيل الازرق') selected @endif>ولاية النيل الازرق</option>
                                    </optgroup>
                                </select>
                                @error('state')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>تفاصيل العقد : </label>
                                <textarea class="form-control" id="details" rows="5" cols="20" name="details" style="height: 45px;"
                                    placeholder="تفاصيل عقد الايجار"> {{ $contract->details }}</textarea>
                                @error('details')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label "> الدفع عبر : </label>

                                <select name="bank_id" class="form-control custom-select2" id="selector"
                                    onchange="yesnoCheck(this);" style="width: 100%; height: 38px;">
                                    @if ($contract->bank_id == 0)
                                        <option value="0" selected>طريقة اخرى</option>
                                    @endif
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}"
                                            @if ($bank->id == $contract->bank_id) selected @endif>
                                            {{ $bank->bank_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('bank_id')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    @if ($contract->bank_id > 0)
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label ">رقم الحساب : </label>
                                <input type="text" class="form-control" name="account_number"
                                value="{{ $contract->account_number }}"
                                    placeholder="1234 4444 6666 7777" maxlength="16" minlength="16"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="text-danger">* الحقل يقبل بيانات من نوع رقم فقط </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label "> كود التحويل : </label>
                                <input type="text" class="form-control" name="secret_code" placeholder="4545"
                                    maxlength="4" minlength="4" value="{{ $contract->secret_code }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="text-danger">* الحقل يقبل بيانات من نوع رقم فقط </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($contract->bank_id == 0)
                    <div class="row" id="adc" style="display: none;">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label ">رقم الحساب : </label>
                                <input type="text" class="form-control" name="account_number"
                                  placeholder="1234 4444 6666 7777" maxlength="16" minlength="16"
                                 >
                                <span class="text-danger">* الحقل يقبل بيانات من نوع رقم فقط </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label ">  كود التحويل : </label>
                                <input type="text" class="form-control" name="secret_code"
                                 placeholder="4545" maxlength="4" minlength="4">
                                <span class="text-danger">* الحقل يقبل بيانات من نوع رقم فقط </span>
                            </div>
                        </div>
                    </div>
                    @endif


                    <div style="text-align: center">
                        <a href="{{ route('contract.index') }}" class="btn btn-secondary"> رجوع</a>
                        <button type="submit" class="btn btn-primary"> حفظ </button>
                    </div>
            </div>

            </form>
        </div>
    @stop
    @section('script')
        <script type="text/javascript">
            function yesnoCheck(that) {
                if (that.value > 0) {
                    document.getElementById("adc").style.display = "flex";
                } else {
                    document.getElementById("adc").style.display = "none";
                }
            }
            $('#driver_info').hide();
            $('input[type="radio"]').click(function() {
                if ($(this).attr('id') == 'type_div') {
                    $('#driver_info').hide();
                } else {
                    $('#driver_info').show();
                }
            });
            $(document).ready(function() {
                $(document).on('change', '.getcar', function() {
                    var car_id = $(this).val();
                    console.log(car_id);
                    var op = "";
                    $.ajax({
                        type: 'get',
                        url: '{!! URL::to('findCarDetails') !!}',
                        data: {
                            'id': car_id
                        },
                        dataType: 'json', //return data will be json
                        success: function(data) {
                            console.log("price");
                            console.log(data.model);
                            console.log(data.cost_of_day);
                            console.log(data.price);
                            $('.model').val(data.model);
                            $('.cost_of_day').val(data.cost_of_day);
                            $('.price').val(data.price);
                        },
                        error: function() {}
                    });
                });
            });
        </script>
    @stop
