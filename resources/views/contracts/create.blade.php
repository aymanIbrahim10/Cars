@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | العقودات | إضافة عقد ')
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
                <form action="{{ route('contract.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <p class="mb-20">البيانات الاساسية للمستأجر : </p>
                    <hr>
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>إسم المستاجر : </label>
                                <select class="custom-select2 form-control" name="cus_id"
                                    style="width: 100%; height: 38px;">
                                    <optgroup label="اكتب اسم المستأجر">
                                        @if (!$customers->count())
                                            <option disabled> لا يتوفر بيانات زبائن </option>
                                        @else
                                            <option selected disabled> اختر اسم الزبون</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->cus_nam }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
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
                                <select style="width: 100%; height: 38px;" class="custom-select2 form-control getcar"
                                    name="car_id">
                                    <optgroup label="اكتب اسم السيارة">
                                        @if (!$cars->count())
                                            <option disabled> لا يتوفر سيارات للاستئجار </option>
                                        @else
                                            <option selected disabled> اختر سيارة</option>
                                            @foreach ($cars as $car)
                                                <option value="{{ $car->id }}">{{ $car->car_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                            </div>
                            @error('car_id')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12 d-flex mt-2 mb-5">
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" id="type_div" name="customRadio" class="custom-control-input"
                                    checked>
                                <label class="custom-control-label" for="type_div">بدون سائق</label>
                            </div>

                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" id="type_div2" name="customRadio" class="custom-control-input">
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
                                        <option value="0">بدون سائق</option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->driver_nam }}</option>
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
                                <input type="text" class="model form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label ">تكلفة إيجار اليوم : </label>
                                <input type="text" class="cost_of_day form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label">سعر السيارة : </label>
                                <input type="text" class="price form-control" disabled>
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
                                    class="form-control" placeholder="اكتب العنوان الخاص بالعقد"
                                    value="{{ date('Y-m-d') }}">
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
                                    class="form-control" placeholder="اكتب العنوان الخاص بالعقد">
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
                                        <option value="ولاية الخرطوم">ولاية الخرطوم</option>
                                        <option value="ولاية الجزيرة">ولاية الجزيرة</option>
                                        <option value="ولاية بورتسودان">ولاية بورتسودان</option>
                                        <option value="ولاية كردفان">ولاية كردفان</option>
                                        <option value="ولاية النيل الازرق">ولاية النيل الازرق</option>
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
                                <textarea class="form-control" id="details" rows="3" cols="5" name="details" style="height: 45px;"
                                    placeholder="تفاصيل عقد الايجار"></textarea>
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
                                <select style="width: 100%; height: 38px;" class="custom-select2 form-control"
                                    name="bank_id" id="selector" onchange="yesnoCheck(this);">
                                    <optgroup label="اكتب اسم البنك التي تريد الدفع خلاله">
                                        @if (!$banks->count())
                                            <option disabled> لا يتوفر بيانات للدفع عبر اي بنك </option>
                                        @else
                                            <option value="0">طريقة اخرى</option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->bank_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('bank_id')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" id="adc" style="display: none;">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label ">رقم الحساب : </label>
                                <input type="text" class="form-control integerInput" name="account_number"
                                    placeholder="1234 4444 6666 7777" maxlength="16" minlength="16">
                                <span class="text-danger">* الحقل يقبل بيانات من نوع رقم فقط </span>
                            </div>
                            @error('account_number')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label "> كود التحويل : </label>
                                <input type="text" class="form-control integerInput" name="secret_code"
                                    placeholder="4545" maxlength="4" minlength="4">
                                <span class="text-danger">* الحقل يقبل بيانات من نوع رقم فقط </span>
                            </div>
                            @error('secret_code')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div>

                        <div style="text-align: center">
                            <a href="{{ route('contract.index') }}" class="btn btn-secondary"> رجوع</a>
                            <button type="submit" class="btn btn-primary"> حفظ </button>
                        </div>
                </form>
            </div>
        </div>
    @stop
    @section('script')
        <script type="text/javascript">
            $(function() {
                $('.integerInput').on('input', function() {
                    this.value = this.value
                        .replace(/[^\d]/g, ''); // numbers and decimals only

                });
            });
            function yesnoCheck(that) {
                if (that.value > 0) {
                    document.getElementById("adc").style.display = "flex";
                } else {
                    document.getElementById("adc").style.display = "none";
                }
            }
            $(document).ready(function() {

                $('#driver_info').hide();


                $('input[type="radio"]').click(function() {
                    if ($(this).attr('id') == 'type_div') {
                        $('#driver_info').hide();
                    } else {
                        $('#driver_info').show();
                    }
                });
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
