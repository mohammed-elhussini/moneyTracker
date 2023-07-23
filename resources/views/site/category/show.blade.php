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
                        <h5 class="text-dark font-weight-bold my-1 mr-5"> قسم {{$category->name}}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}" class="text-muted">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('category.index')}}" class="text-muted">الأقسام</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="text-muted"> قسم {{$category->name}}</span>
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
                <div class="card card-custom gutter-b">
                    @if ($category->trashed())
                        <div class="btn font-weight-bold btn-danger mb-5">
                            القسم ف سله المهملات
                        </div>
                    @endif
                    <div class="card-body">

                        <!--begin::Top-->
                        <div class="d-flex">
                            <!--begin::Pic-->
                            <div class="flex-shrink-0 mr-7">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic"
                                         src="{{$category->icon ? asset($category->icon) : asset('/assets/media/users/blank.png') }}">
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                    <!--begin::User-->
                                    <div class="mr-3">
                                        <!--begin::Name-->
                                        <div
                                            class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                            {{$category->name}}
                                        </div>
                                        <!--end::Name-->
                                    </div>
                                    <!--begin::User-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <!--begin::Description-->
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                        {!! $category->description !!}
                                    </div>
                                    <!--end::Description-->

                                    <div class="my-lg-0 my-1">
                                        <div
                                            class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2">
                                            عدد الفواتير :
                                            {{$category->transactions->count()}}
                                        </div>
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Separator-->
                        <div class="separator separator-solid my-7"></div>
                        <!--end::Separator-->
                        <!--begin::Bottom-->
                        <div class="d-flex align-items-center flex-wrap">


                            <!--begin: Item-->
                            @if ($category->parent)

                                <h3 class="w-100">التصنيف الأب</h3>
                                <a href="{{route('category.show',$category->parent->id)}}"
                                   class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 mr-4">
                                        <img class="h-75 align-self-end"
                                             src="{{$category->parent->icon ? asset($category->parent->icon) : asset('/assets/media/users/blank.png') }}">

                                    </div>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span
                                            class="font-weight-bolder font-size-sm">
                                            {{$category->parent->name}}
                                        </span>
                                        <span class="font-weight-bolder font-size-h5">
            <span class="text-dark-50 font-weight-bold">$</span>249,500</span>
                                    </div>

                                </a>
                            @else
                                <h3 class="w-100 mb-4">بدون التصنيف الأب </h3>
                            @endif
                            <!--end: Item-->

                        </div>
                        <!--end::Bottom-->
                        <!--begin::Separator-->
                        <div class="separator separator-solid my-7"></div>
                        <!--end::Separator-->
                        <!--begin::Bottom-->
                        <div class="d-flex align-items-center flex-wrap">
                            <h3 class="w-100 mb-4">التصنيف الفرعى</h3>
                            @foreach($category->child as $childCat)
                                <!--begin: Item-->
                                <a href="{{route('category.show',$childCat->id)}}"
                                   class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 mr-4">
                                        <img class="h-75 align-self-end"
                                             src="{{$childCat->icon ? asset($childCat->icon) : asset('/assets/media/users/blank.png') }}">

                                    </div>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span
                                            class="font-weight-bolder font-size-sm">
                                            {{$childCat->name}}
                                        </span>
                                        <span class="font-weight-bolder font-size-h5">
            <span class="text-dark-50 font-weight-bold">$</span>249,500</span>
                                    </div>
                                </a>
                                <!--end: Item-->
                            @endforeach
                        </div>
                        <!--end::Bottom-->
                    </div>
                </div>


                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">الفواتير الخاصة بقسم {{ $category->name }}</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{route('category.create')}}" class="btn btn-primary font-weight-bolder">
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
											</span>فاتورة جديدة</a>
                            <!--end::Button-->
                        </div>
                    </div>


                    <div class="card-body">
                        @if($category->transactions->isNotEmpty())
                         {{$category->transactions->count()}}

                            <!--begin: Datatable-->
                            <table class="table table-separate"
                                   id="kt_datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان الفاتورة</th>
                                    <th>وصف الفاتورة</th>
                                    <th>التاريخ الفاتورة</th>
                                    <th>نوع الفاتورة</th>
                                    <th>طريقة الدفع</th>
                                    <th>التكلفة</th>
                                    <th>الأكشن</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category->transactions as $transaction )
                                    <tr>
                                        <th>
                                            {{$loop->index}}
                                        </th>
                                        <th>{{$transaction->name}}</th>
                                        <th>
                                            {{$transaction->discription ? $transaction->discription : 'لم يتم إضافة وصف' }}
                                        </th>
                                        <th>{{$transaction->transaction_date}}</th>
                                        <th>{{$transaction->type}}</th>
                                        <th>
                                            {{ $transaction->payment ? $transaction->payment->name : 'لا يوجد وسيله دفع' }}
                                        </th>
                                        <th>{{$transaction->cost}}</th>
                                        <th>الأكشن</th>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="border-top fw-semibold fs-6 text-gray-800">
                                    <th>#</th>
                                    <th>عنوان الفاتورة</th>
                                    <th>وصف الفاتورة</th>
                                    <th>التاريخ الفاتورة</th>
                                    <th>نوع الفاتورة</th>
                                    <th>طريقة الدفع</th>
                                    <th>التكلفة</th>
                                    <th>الأكشن</th>
                                </tr>
                                <tr class="fw-bold fs-6">
                                    <th colspan="3" class="text-nowrap align-end">Total:</th>
                                    <th colspan="5" class="text-danger fs-3">$3008160 ( $14371710 total)
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                            <!--end: Datatable-->
                        @endif
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
                "scrollY": "500px",
                "scrollCollapse": true,
                "scrollX": true,
                "fixedColumns": {
                    left: 1
                },
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
