@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | قائمة العقودات')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-100px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>شاشة العقودات</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> قائمة العقودات </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-left">

                            <button class="btn btn-primary">
                                {{ date('Y-m-d') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pb-20 pt-10">
                    <form action="{{ route('contract.search') }}" method="POST" role="search" autocomplete="off">
                        @csrf
                        <div class="row mr-4">
                            <div class="col-lg-4" id="start_at">
                                <div class="form-group">
                                    <label>من تاريخ : </label>
                                    <input type="date" class="form-control" name="start_at">
                                    @error('start_at')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4" id="end_at">
                                <div class="form-group">
                                    <label for="end_at">إلى تاريخ : </label>
                                    <input type="date" class="form-control" name="end_at">
                                    @error('start_at')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mr-4 mb-5">
                            <div class="col-sm-1 col-md-1">
                                <button class="btn btn-primary btn-block">بحث</button>
                            </div>
                        </div>
                    </form>
                    @if (isset($details))
                    <table class="table hover data-table-export">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الموظف</th>
                                <th>اسم الزبون</th>
                                <th>اسم السائق</th>
                                <th>اسم السيارة</th>
                                <th>الدفع عبر</th>
                                <th>تاريخ الايجار</th>
                                <th>تاريخ الانتهاء</th>
                                <th class="table-plus datatable-nosort"> العمليات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($contracts as $contract)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td class="table-plus">{{ $i }}</td>
                                    <td>
                                        {{ $contract->user->name }}
                                    </td>
                                    <td>
                                        {{ $contract->customer->cus_nam }}
                                    </td>
                                    <td>
                                        @if ($contract->driver_id == 0)
                                            بدون سائق
                                        @else
                                            {{ $contract->driver->driver_nam }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $contract->car->car_name }}
                                    </td>
                                    <td>
                                        @if ($contract->bank_id == 0)
                                            طريقة اخرى
                                        @else
                                            {{ $contract->bank->bank_name }}
                                        @endif

                                    </td>
                                    <td>
                                        {{ $contract->start_date }}
                                    </td>
                                    <td>
                                        {{ $contract->end_date }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item"
                                                    href="{{ route('contract.show', $contract->id) }}"><i
                                                        class="dw dw-eye"></i> عرض</a>
                                                <a class="dropdown-item" href="{{ route('print', $contract->id) }}"><i
                                                        class="dw dw-print"></i> طباعة </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('contract.edit', $contract->id) }}"><i
                                                        class="dw dw-edit2"></i> تعديل</a>
                                                <a class="dropdown-item" href="#"
                                                    data-contract_id="{{ $contract->id }}" data-toggle="modal"
                                                    data-target="#delete_contract"><i class="dw dw-delete-3"></i>
                                                    حذف</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <table class="table hover data-table-export">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الموظف</th>
                                    <th>اسم الزبون</th>
                                    <th>اسم السائق</th>
                                    <th>اسم السيارة</th>
                                    <th>الدفع عبر</th>
                                    <th>تاريخ الايجار</th>
                                    <th>تاريخ الانتهاء</th>
                                    <th class="table-plus datatable-nosort"> العمليات </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($contracts as $contract)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td class="table-plus">{{ $i }}</td>
                                        <td>
                                            {{ $contract->user->name }}
                                        </td>
                                        <td>
                                            {{ $contract->customer->cus_nam }}
                                        </td>
                                        <td>
                                            @if ($contract->driver_id == 0)
                                                بدون سائق
                                            @else
                                                {{ $contract->driver->driver_nam }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $contract->car->car_name }}
                                        </td>
                                        <td>
                                            @if ($contract->bank_id == 0)
                                                طريقة اخرى
                                            @else
                                                {{ $contract->bank->bank_name }}
                                            @endif

                                        </td>
                                        <td>
                                            {{ $contract->start_date }}
                                        </td>
                                        <td>
                                            {{ $contract->end_date }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item"
                                                        href="{{ route('contract.show', $contract->id) }}"><i
                                                            class="dw dw-eye"></i> عرض</a>
                                                    <a class="dropdown-item" href="{{ route('print', $contract->id) }}"><i
                                                            class="dw dw-print"></i> طباعة </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('contract.edit', $contract->id) }}"><i
                                                            class="dw dw-edit2"></i> تعديل</a>
                                                    <a class="dropdown-item" href="#"
                                                        data-contract_id="{{ $contract->id }}" data-toggle="modal"
                                                        data-target="#delete_contract"><i class="dw dw-delete-3"></i>
                                                        حذف</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <!-- حذف العقد -->
            <div class="modal fade" id="delete_contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف العقد</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <form action="contract/destroy" method="post">
                                @method('delete')
                                @csrf
                        </div>
                        <div class="modal-body">
                            هل انت متاكد من عملية الحذف ؟
                            <input type="hidden" name="contract_id" id="contract_id" value="">
                        </div>
                        <hr>
                        <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">

                            <div class="col-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-danger">تاكيد</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        @stop
        @section('script')
            <script>
                $(document).ready(function() {
                    $('input[type="radio"]').click(function() {
                        if ($(this).attr('id') == 'type_div') {
                            $('#start_at').show();
                            $('#end_at').show();
                        } else {
                            $('#start_at').hide();
                            $('#end_at').hide();
                        }
                    });
                });
                $('#delete_contract').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var contract_id = button.data('contract_id')
                    var modal = $(this)
                    modal.find('.modal-body #contract_id').val(contract_id);
                })
            </script>
            @include('alerts.success')
            @include('alerts.errors')
        @stop
