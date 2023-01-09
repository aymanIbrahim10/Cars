@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | قائمة السائقين')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-100px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>قائمة السائقين</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> قائمة السائقين </li>
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
                    <table class="table hover data-table-export">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم السائق</th>
                                <th>العنوان الاول</th>
                                <th>العنوان الثاني</th>
                                <th>رقم الهاتف</th>
                                <th> الجنسية</th>
                                <th class="table-plus datatable-nosort"> العمليات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($drivers as $driver)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td class="table-plus">{{ $i }}</td>
                                    <td>
                                        {{ $driver->driver_nam }}
                                    </td>
                                    <td>
                                        {{ $driver->driver_first_address }}
                                    </td>
                                    <td>
                                        {{ $driver->driver_secund_address }}
                                    </td>
                                    <td>
                                        {{ $driver->phone_num }}
                                    </td>
                                    <td>
                                        {{ $driver->nationality }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{ route('driver.show', $driver->id) }}"><i
                                                        class="dw dw-eye"></i> عرض</a>
                                                <a class="dropdown-item" href="{{ route('driver.edit', $driver->id) }}"><i
                                                        class="dw dw-edit2"></i> تعديل</a>
                                                <a class="dropdown-item" href="#"
                                                    data-driver_id="{{ $driver->id }}" data-toggle="modal"
                                                    data-target="#delete_driver"><i class="dw dw-delete-3"></i> حذف</a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- حذف السائق -->
            <div class="modal fade" id="delete_driver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف السائق</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <form action="driver/destroy" method="post">
                                @method('delete')
                                @csrf
                        </div>
                        <div class="modal-body">
                            هل انت متاكد من عملية الحذف ؟
                            <input type="hidden" name="driver_id" id="driver_id" value="">
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
                $('#delete_driver').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var driver_id = button.data('driver_id')
                    var modal = $(this)
                    modal.find('.modal-body #driver_id').val(driver_id);
                })
            </script>
            @include('alerts.success')
            @include('alerts.errors')
        @stop
