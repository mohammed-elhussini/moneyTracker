@extends('site.layout.layout')

@section('content')
    <section class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">الفواتير</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}" class="text-muted">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('transaction.index')}}" class="text-muted">الفواتير</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
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

                <!--begin::Nav Panel Widget 1-->
                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">
                                الفواتير
                                <span
                                    class="font-weight-bolder label label-xl label-light-success label-inline px-3 py-5 min-w-45px">
                                   {{$userTransaction->count()}}
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
                            عند  مسح طريقه الدفع  لفاتوره موجود يحدث خطا
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
                            @foreach($userTransaction as $transaction)
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
                                        <span class="btn font-weight-bold btn-lg  {{$transaction->type == 'income' ? 'btn-outline-success' : 'btn-outline-danger'}}">
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
    </section>
@endsection
@push('styles')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <style>

    </style>
@endpush
@push('scripts')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script>
        jQuery(document).ready(function () {
            var table = $("#kt_datatable").DataTable({
                "scrollY": "700px",
                "scrollCollapse": true,
                "scrollX": true,
                "fixedColumns": {
                    left: 1
                },
                "pageLength": 25,
                "select": true,
                "pagingType": 'full_numbers',
                "paging": true,
                "dom": 'lBfrtip', // Specify the placement of the buttons
                // "buttons": [
                //     'copy', 'excel', 'csv', 'pdf', 'print' // Add the export buttons you want
                // ],
                "buttons": [
                    // {
                    //     extend: 'copyHtml5',
                    //     exportOptions: {
                    //         columns: [ 2 , ':visible' ]
                    //     }
                    // },
                    {
                        extend: 'excelHtml5',
                        // exportOptions: {
                        //     columns: ':visible'
                        // }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [2, 4, 6]
                        }
                    },
                    'colvis'
                ],
                "language": {
                    "url": 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json',
                    "lengthMenu": "Show _MENU_",
                },
            });

        });
    </script>
@endpush




