@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | الرئيسية ')
@section('content')
    {{-- <main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">الرئيسية</li>
        <li class="breadcrumb-item"><a href="#">المدير</a>
        </li>
        <li class="breadcrumb-item active">لوحة التحكم</li>
    </ol>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse card-primary">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <button type="button"  class="btn btn-transparent active p-a-0 pull-left">
                                    <i class="icon-settings"></i>
                                </button>
                            </div>
                            <h4 class="m-b-0">80</h4>
                            <p>عدد السيارات</p>
                        </div>
                        <div class="chart-wrapper p-x-1" style="height:70px;">

                        </div>
                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse card-info">
                        <div class="card-block p-b-0">
                            <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                                <i class="icon-location-pin"></i>
                            </button>
                            <h4 class="m-b-0">20</h4>
                            <p>عدد السايقين</p>
                        </div>
                        <div class="chart-wrapper p-x-1" style="height:70px;">
                            <canvas id="card-chart2" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse card-warning">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <button type="button"  class="btn btn-transparent active p-a-0 pull-left">
                                    <i class="icon-settings"></i>
                                </button>
                            </div>
                            <h4 class="m-b-0">100</h4>
                            <p>عدد العقودات</p>
                        </div>
                        <div class="chart-wrapper" style="height:70px;">
                            <canvas id="card-chart3" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse card-danger">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                                    <i class="icon-settings"></i>
                                </button>
                            </div>
                            <h4 class="m-b-0">20</h4>
                            <p>عدد الموظفين</p>
                        </div>
                        <div class="chart-wrapper p-x-1" style="height:70px;">
                            <canvas id="card-chart4" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!--/col-->

            </div>
            <!--/row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            اخر زبايننا
                        </div>
                        <div class="card-block">
                            <!--/.row-->
                            <br/>
                            <table class="table table-hover">
                                <thead class="thead-default">
                                    <tr>
                                        <th class="text-xs-center">الصورة
                                        </th>
                                        <th>الاسم</th>
                                        <th class="text-xs-center">العنوان</th>
                                        <th class="text-xs-center">طريقة الدفع</th>
                                        <th>النشاط</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="img/avatars/1.jpg" class="img-avatar" alt="admin@bootstrapmaster.com" src="img/avatars/1.jpg">
                                                <span class="avatar-status tag-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Yiorgos Avraamu</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="img/flags/USA.png" alt="USA" style="height:24px;" src="img/flags/USA.png">
                                        </td>

                                        <td class="text-xs-center">
                                            <i class="fa fa-cc-mastercard" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>10 sec ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com" src="img/avatars/2.jpg">
                                                <span class="avatar-status tag-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Avram Tarasios</div>
                                            <div class="small text-muted">

                                                <span>Recurring</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="img/flags/Brazil.png" alt="Brazil" style="height:24px;" src="img/flags/Brazil.png">
                                        </td>

                                        <td class="text-xs-center">
                                            <i class="fa fa-cc-visa" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>5 minutes ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com" src="img/avatars/3.jpg">
                                                <span class="avatar-status tag-warning"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Quintin Ed</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015</div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="img/flags/India.png" alt="India" style="height:24px;" src="img/flags/India.png">
                                        </td>

                                        <td class="text-xs-center">
                                            <i class="fa fa-cc-stripe" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>1 hour ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com" src="img/avatars/4.jpg">
                                                <span class="avatar-status tag-default"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Enéas Kwadwo</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="img/flags/France.png" alt="France" style="height:24px;" src="img/flags/France.png">
                                        </td>

                                        <td class="text-xs-center">
                                            <i class="fa fa-paypal" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Last month</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com" src="img/avatars/5.jpg">
                                                <span class="avatar-status tag-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Agapetus Tadeáš</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="img/flags/Spain.png" alt="Spain" style="height:24px;" src="img/flags/Spain.png">
                                        </td>

                                        <td class="text-xs-center">
                                            <i class="fa fa-google-wallet" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Last week</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com" src="img/avatars/6.jpg">
                                                <span class="avatar-status tag-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Friderik Dávid</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="img/flags/Poland.png" alt="Poland" style="height:24px;" src="img/flags/Poland.png">
                                        </td>

                                        <td class="text-xs-center">
                                            <i class="fa fa-cc-amex" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Yesterday</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>

    </div>
    <!--/.container-fluid-->
</main> --}}
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo text-center">
                <img src="{{ asset('assets/vendors/images/Untitled-1.svg') }}" alt="image" style="width:70%">
            </div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                جاري التحميل ....
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="row">
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">{{ $cars->count() }}</div>
                                <div class="weight-600 font-14">عدد السيارات</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart2"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">{{ $drivers->count() }}</div>
                                <div class="weight-600 font-14">عدد السائقين</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart3"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">{{ $customers->count() }}</div>
                                <div class="weight-600 font-14">زبائننا</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart4"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">{{ $contracts->count() }}</div>
                                <div class="weight-600 font-14">عدد العقودات</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                <h2 class="h4 pd-20">قائمة زبائننا</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الزبون</th>
                            <th>العنوان الاول</th>
                            <th>العنوان الثاني</th>
                            <th>رقم الهاتف</th>
                            <th> الجنسية</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($customers as $customer)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td class="table-plus">{{ $i }}</td>
                                <td>
                                    {{ $customer->cus_nam }}
                                </td>
                                <td>
                                    {{ $customer->first_address }}
                                </td>
                                <td>
                                    {{ $customer->secund_address }}
                                </td>
                                <td>
                                    {{ $customer->phone_num }}
                                </td>
                                <td>
                                    {{ $customer->nationality }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @stop
