@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | العقودات | إستخراج فاتورة ')
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
                                    <li class="breadcrumb-item" aria-current="page">  العقودات </li>
                                    <li class="breadcrumb-item active" aria-current="page"> استخراج فاتورة عقد </li>
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

            <div class="invoice-wrap" id="print">
                <div class="invoice-box" style="width: unset;" >
                    <div class="invoice-header">
                        <div class="logo text-left">
                        <img src="{{ asset('assets/vendors/images/Untitled-1.svg') }}"  alt="image" style="width:14%">
                        </div>
                    </div>
                    <h4 class="text-center mb-30 weight-600">الفاتورة</h4>
                    <div class="row pb-30">
                        <div class="col-md-6">
                            <h5 class="mb-15"> اسم الزبون : {{ $contracts->customer->cus_nam }}</h5>
                            <p class="font-14 mb-5">تاريخ الفاتورة : <strong class="weight-600">{{ date('Y-m-d') }}</strong>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <p class="font-14 mb-5">من شركة : جنرال ليموزين</strong></p>
                                <p class="font-14 mb-5">عنواننا : الخرطوم</p>
                                <p class="font-14 mb-5">الخط الساخن : 45456</p>
                            </div>
                        </div>
                    </div>
                    <table class="table hover table-bordered">
                        <thead>
                            <tr style="background-color: #eaeaea;">
                                <th>اسم الزبون</th>
                                <th>اسم السيارة</th>
                                @if ($contracts ->driver_id > 0)
                                <th> اسم السائق </th>
                            @endif
                            <th>الوصف</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $contracts->customer->cus_nam }}</td>
                                    <td>{{ $contracts->car->car_name }}</td>
                                    @if ($contracts ->driver_id > 0)<td>
                                        {{ $contracts->driver->driver_nam }}</td>
                                    @endif
                                    <td>{{ $contracts ->details }}</td>
                                </tr>
                        </tbody>
                    </table>
                    <table class="table hover table-bordered">
                        <thead>
                            <tr style="background-color: #eaeaea;">
                                <th>من تاريخ</th>
                                <th>إلى تاريخ</th>
                                <th> اسم الولاية </th>
                                <th>تم بواسطة</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $contracts->start_date }}</td>
                                    <td>{{ $contracts->end_date }}</td>
                                    @if ($contracts ->driver_id > 0)<td>
                                        {{ $contracts->state}}</td>
                                    @endif
                                    <td>{{ $contracts->user->name }}</td>
                                </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-md-4">
                            <p>سعر السيارة : {{ $contracts->car->price }}</p>
                            <p>تكلفة اليوم : {{ $contracts->car->cost_of_day }}</p>
                            {{-- <p>تكلفة اليوم : {{ $contracts->car->price }}</p> --}}
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4">
                            @php
                                $i = 2;
                                $munth_cost = $contracts->car->cost_of_day * 30 ;

                                $total = $munth_cost;
                                $result = $total * $i ;
                            @endphp
                            @if ($contracts -> driver_id > 0  )
                            <p>
                                نسبة السائق : 2%
                            </p>
                            تكلفة الشهر : {{ $munth_cost }}
                            @endif
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4">
                            <p class="font-20 weight-600 text-danger" >الاجمالي بدون سائق : {{ $munth_cost }}</p>
                            @if ($contracts -> driver_id > 0  )
                            <p class="font-20 weight-600 text-danger" >الاجمالي مع سائق : {{ $result }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="invoice-desc pb-30">
                        <div class="invoice-desc-head clearfix">
                        </div>
                        <div class="invoice-desc-body">
                        </div>
                        @if ($contracts->bank_id > 0)

                        <div class="invoice-desc-footer " style="margin-top: -290px;">
                            <div class="invoice-desc-head clearfix">
                                <div class="invoice-subtotal">معلومات البنك</div>
                                <div class="invoice-rate">التاريخ</div>
                                <div class="invoice-sub">اسم البنك</div>
                            </div>
                            <div class="invoice-desc-body">
                                <ul>
                                    <li class="clearfix">
                                        <div class="invoice-subtotal">
                                            <p class="font-14 mb-5">اسم العميل : <strong
                                                    class="weight-600">{{ $contracts->customer->cus_nam }}</strong></p>
                                            <p class="font-14 mb-5">رقم الحساب : <strong
                                                    class="weight-600">{{ $contracts->account_number }}</strong></p>
                                            <p class="font-14 mb-5">كود التحويل: <strong
                                                    class="weight-600">{{ $contracts->secret_code }}</strong></p>
                                        </div>
                                        <div class="invoice-rate font-20 weight-600">{{ date('Y-m-d') }}</div>
                                        <div class="invoice-sub"><span
                                                class="weight-600 font-14">{{ $contracts->bank->bank_name }}</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        <h4 class="text-center pb-20">شكراً لمعاملتك معنا !</h4>
                    </div>
                    <div class="container-fluid w-100 mb-4" id="print_Button">
                        <button class="btn btn-primary float-end  ms-2" onclick="printDiv()"><i
                                class="mdi mdi-printer me-1 "></i> طباعة الان </button>
                        <a href="{{ route('contract.index') }}" class="btn btn-success float-end "><i
                                class="mdi mdi-telegram me-1"></i>الرجوع</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @section('script')
        <script>
            function printDiv() {
                $('#print_Button').hide();
                var printContents = document.getElementById('print').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }
        </script>
    @stop
