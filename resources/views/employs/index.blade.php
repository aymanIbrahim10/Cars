@extends('layouts.dashboard')
@section('title', 'لوحة التحكم | قائمة الموظفين')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-100px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>قائمة الموظفين </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> قائمة الموظفين </li>
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
                                <th>صورة الموظف </th>
                                <th>اسم الموظف</th>
                                <th>البريد </th>
                                <th>رقم الهاتف </th>
                                <th>العنوان </th>
                                <th class="table-plus datatable-nosort"> العمليات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($employs as $employ)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td class="table-plus">{{ $i }}</td>
                                    <td>

                                        @if ($employ->picture == '')
                                            <img src="{{ asset('assets/vendors/images/Avatar-Profile-Vector-PNG.png') }}"
                                                alt="profile"
                                                style="    width: 50px;
    hight: 46px;
    border: 2px solid #ddd;
    padding: 5px;
    border-radius: 5px;">
                                        @else
                                            <img src=" {{ $employ->picture }}" alt="profile"
                                                style="    width: 50px;
    hight: 46px;
    border: 2px solid #ddd;
    padding: 5px;
    border-radius: 5px;">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $employ->name }}
                                    </td>
                                    <td>
                                        {{ $employ->email }}
                                    </td>
                                    <td>
                                        {{ $employ->phone }}
                                    </td>
                                    <td>
                                        {{ $employ->address }}
                                    </td>
                                    <td>
                                        @if (auth()->user()->status == 0)
                                            لا يوجد عمليات
                                        @else
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#"
                                                        data-employ_id="{{ $employ->id }}" data-toggle="modal"
                                                        data-target="#delete_bank"><i class="dw dw-delete-3"></i> حذف</a>
                                                </div>
                                            </div>
                                        @endif

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- حذف الزبون -->
            <div class="modal fade" id="delete_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف الموظف</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <form action="employ/destroy" method="post">
                                @method('delete')
                                @csrf
                        </div>
                        <div class="modal-body">
                            هل انت متاكد من عملية الحذف ؟
                            <input type="hidden" name="employ_id" id="employ_id" value="">
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
                $('#delete_bank').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var employ_id = button.data('employ_id')
                    var modal = $(this)
                    modal.find('.modal-body #employ_id').val(employ_id);
                })
            </script>
            @include('alerts.success')
            @include('alerts.errors')
        @stop
