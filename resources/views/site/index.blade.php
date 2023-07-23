@extends('site.layout.layout')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">الرئسية</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="card card-custom mb-5">
                    <form class="form">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>نص من الفاتورة:</label>
                                        <input type="email"
                                               class="form-control form-control-solid  @error('transaction_text')is-invalid @enderror"
                                               placeholder="البحث فى نص من الفاتورة"
                                               name="transaction_text"
                                               value="{{old('transaction_text')}}"/>
                                        @error('transaction_text')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>التكلفة</label>
                                        <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number"
                                                   class="form-control form-control-solid @error('cost')is-invalid @enderror"
                                                   name="transaction_cost"
                                                   value="{{old('cost')}}"
                                                   placeholder="99.9"/>
                                            @error('cost')
                                            <div class="form-text invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>البحث من تاريخ:</label>
                                        {{ $transactions->min('transaction_date') }}
                                        <input type="text"
                                               class="form-control form-control-solid flatpickr @error('transaction_date_start')is-invalid @enderror"
                                               id="kt_datepicker_1_modal"
                                               readonly="readonly"
                                               placeholder="البحث من تاريخ"
                                               name="transaction_date_start"
                                               value="{{old('transaction_date_start')}}"/>
                                        @error('transaction_date_start')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>الى تاريخ:</label>
                                        {{ $transactions->max('transaction_date') }}
                                        <input type="text"
                                               class="form-control form-control-solid flatpickr @error('transaction_date_end')is-invalid @enderror"
                                               id="kt_datepicker_1_modal"
                                               readonly="readonly"
                                               placeholder="الى تاريخ"
                                               name="transaction_date_end"
                                               value="{{old('transaction_date_end')}}"/>
                                        @error('transaction_date_end')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>طريقه الدفع:</label>
                                        <select class="form-control select2"
                                                id="kt_select2_1"
                                                name="transaction_payment"
                                                data-placeholder="طريقه الدفع">
                                            <option value=""></option>
                                            @foreach($payments as $payment)
                                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('transaction_payment')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>القسم:</label>
                                        <select class="form-control select2"
                                                id="kt_select2_2"
                                                name="transaction_category"
                                                multiple="multiple"
                                                data-placeholder="القسم">
                                            <option value=""></option>
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('transaction_category')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> نوع المعاملة:</label>
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio"
                                                       name="transaction_type"
                                                       value="income"/>
                                                <span></span>
                                                income
                                            </label>

                                            <label class="radio radio-danger">
                                                <input type="radio"
                                                       name="transaction_type"
                                                       value="expensive"/>
                                                <span></span>
                                                expensive
                                            </label>

                                            @error('transaction_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-end">
                                <div class="col-lg-6 text-lg-right">
                                    <button type="submit" class="btn btn-primary">بحث</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <!--begin::Nav Panel Widget 1-->
                <div class="card card-custom ">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">
                                فواتير

{{--                                {{ Carbon\Carbon::today()->format('F d, Y') }}--}}
                                {{ date('Y-m-d') }}
                                <span
                                    class="font-weight-bolder label label-xl label-light-success label-inline px-3 py-5 min-w-45px">
                                  {{$transactionsToday->count()}}
                                </span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{route('transaction.create')}}"
                               class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<circle fill="#000000" cx="9" cy="15" r="6"/>
														<path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                                فاتورة جديدة
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-danger" role="alert">
                            عند مسح طريقه الدفع لفاتوره موجود يحدث خطا
                        </div>

                        <!--begin: Datatable-->
                        <table class="table table-separate"
                               id="kt_datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الأسم</th>
                                <th>طريقه الدفع</th>
                                <th>القسم</th>
                                <th>نوع المعاملة</th>
                                <th>التكلفة</th>
                                <th>تاريخ الفاتورة</th>
                                <th>تاريخ الانشاء</th>
                                <th>عدد الوصلات</th>
                                <th>الأكشن</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactionsToday as $transaction)
                                <tr>
                                    <td>{{$loop->index}}</td>
                                    <td>{{$transaction->name}}</td>
                                    <td>{{$transaction->payment->name }} </td>
                                    <td>
                                        @foreach($transaction->categories as $cat)
                                            <span class="btn font-weight-bold btn-primary mr-2">
                                                {{$cat->name}}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <span
                                            class="btn font-weight-bold btn-lg {{$transaction->type == 'income' ? 'btn-outline-success' : 'btn-outline-danger'}}">
                                          {{$transaction->type}}
                                        </span>
                                    </td>

                                    <td>{{$transaction->cost}}</td>
                                    <td>{{$transaction->transaction_date}}</td>
                                    <td>{{$transaction->created_at}}</td>
                                    <td>{{$transaction->invoices()->count()}}</td>
                                    <td class="text-right">
                                        <a href="{{route('transaction.show',$transaction->id)}}"
                                           class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
                    <span class="svg-icon svg-icon-md">
                        <i class="icon-xl la la-eye"></i>
                    </span>
                                        </a>
                                        <a href="{{route('transaction.edit',$transaction->id)}}"
                                           class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                    <span class="svg-icon svg-icon-md">
                        <i class="icon-xl la la-pencil-alt"></i>
                    </span>
                                        </a>
                                        <form class="d-inline-flex"
                                              method="post"
                                              action="{{route('transaction.destroy',$transaction->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" id="kt_sweetalert"
                                                    class="btn btn-sm btn-clean btn-icon kt_sweetalert"
                                                    title="Delete">
                        <span class="svg-icon svg-icon-md">
                            <i class="icon-xl la la-trash-alt"></i>
                        </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="border-top fw-semibold fs-6 text-gray-800">
                                <th>#</th>
                                <th>الأسم</th>
                                <th>طريقه الدفع</th>
                                <th>القسم</th>
                                <th>نوع المعاملة</th>
                                <th>التكلفة</th>
                                <th>تاريخ الفاتورة</th>
                                <th>تاريخ الانشاء</th>
                                <th>عدد الوصلات</th>
                                <th>الأكشن</th>
                            </tr>

                            <tr class="fw-bold fs-6">
                                <th colspan="3" class="text-nowrap align-end">الاجمالى:</th>
                                <th colspan="7" class="text-danger fs-3"></th>
                            </tr>

                            </tfoot>
                        </table>
                        <!--end: Datatable-->
                    </div>
                    <!--begin::Nav Panel Widget 1-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->


        <!--end::Entry-->
        @endsection
        @push('styles')
            <!-- dropify -->
            <link rel="stylesheet" type="text/css" href="{{asset('assets/flatpickr/css/flatpickr.min.css')}}">
            <style>
            </style>
        @endpush
        @push('scripts')
            <script src="{{asset('assets/flatpickr/js/flatpickr.js')}}"></script>
            <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
            <script>
                // Initialization
                jQuery(document).ready(function () {
                    //flatpickr
                    $(".flatpickr").flatpickr({
                        enableTime: true,
                        dateFormat: "Y-m-d H:i",
                        minDate: "{{ $transactions->min('transaction_date') }}",
                        maxDate: "{{ $transactions->max('transaction_date') }}"
                    });



                    // select2
                    KTSelect2.init();
                });
            </script>
    @endpush
