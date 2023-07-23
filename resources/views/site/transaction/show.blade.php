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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            الفاتورة
                            [{{$transaction->name}}]
                        </h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}" class="text-muted">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('transaction.index')}}" class="text-muted">الفواتير</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="text-muted">
                                     الفاتورة
                        [{{$transaction->name}}]
                                </span>
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
        <div class="d-flex flex-column-fluid mb-10">
            <!--begin::Container-->
            <div class="container">
                <!-- begin::Card-->
                <div class="card card-custom overflow-hidden">
                    <div class="card-body">
                        <!-- begin: Invoice-->
                        <!-- begin: Invoice header-->
                        @if ($transaction->trashed())
                            <div class="btn font-weight-bold btn-danger mb-5">
                                القسم ف سله المهملات
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between pt-15 flex-column flex-md-row">
                                    <h1 class="display-4 font-weight-boldest mb-10">
                                        الفاتورة
                                        [{{$transaction->name}}]
                                    </h1>
                                    <div class="d-flex flex-column align-items-md-end px-0">
                                        <span class="d-flex flex-column align-items-md-end opacity-70">
                                            {!! $transaction->description !!}
                                        </span>
                                    </div>
                                </div>
                                <div class="border-bottom w-100"></div>
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">تاريخ الفاتورة.</span>
                                        <span class="opacity-70">{{$transaction->transaction_date}}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">تاريخ الانشاء.</span>
                                        <span class="opacity-70">{{$transaction->created_at}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr class="font-weight-boldest">
                                            <td class="pl-0 pt-7">القسم</td>
                                            <td class="text-danger pr-0 pt-7 text-right">
                                                @foreach($transaction->categories as $cat)
                                                    <span class="btn font-weight-bold btn-primary mr-2">
                                                {{$cat->name}}
                                            </span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="font-weight-boldest border-bottom-0">
                                            <td class="border-top-0 pl-0 py-4">النوع</td>
                                            <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                                 <span
                                                     class="btn font-weight-bold btn-lg {{$transaction->type == 'income' ? 'btn-outline-success' : 'btn-outline-danger'}}">
                                          {{$transaction->type}}
                                        </span>
                                            </td>
                                        </tr>
                                        <tr class="font-weight-boldest border-bottom-0">
                                            <td class="border-top-0 pl-0 py-4">طريقة الدفع</td>
                                            <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                                {{$transaction->payment->name }}
                                            </td>
                                        </tr>
                                        <tr class="font-weight-boldest border-bottom-0">
                                            <td class="border-top-0 pl-0 py-4">التكلفة</td>
                                            <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                                {{$transaction->cost}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="font-weight-bold text-muted text-uppercase">القسم</th>
                                            <th class="font-weight-bold text-muted text-uppercase">النوع</th>
                                            <th class="font-weight-bold text-muted text-uppercase">طريقة الدفع</th>
                                            <th class="font-weight-bold text-muted text-uppercase">التكلفة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="font-weight-bolder">
                                            <td>
                                                @foreach($transaction->categories as $cat)
                                                    <span class="btn font-weight-bold btn-primary mr-2">
                                                {{$cat->name}}
                                            </span>
                                                @endforeach
                                            </td>
                                            <td>{{$transaction->type}}</td>
                                            <td>{{$transaction->payment->name }}</td>
                                            <td class="text-danger font-size-h3 font-weight-boldest">{{$transaction->cost}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice footer-->
                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary font-weight-bold"
                                            onclick="window.print();">
                                        طباعة الفاتورة
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice action-->
                        <!-- end: Invoice-->
                    </div>
                </div>
                <!-- end::Card-->
            </div>
            <!--end::Container-->
        </div>

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!-- begin::Card-->
                <div class="card card-custom overflow-hidden py-15">
                    <!--begin::Heading-->
                    <div class="card-header">
                        <h2 class="card-title">الوصلات</h2>
                    </div>
                    <!--end::Heading-->
                    <div class="card-body">
                        <!--begin::Products-->
                        <div class="row">

                            @foreach($transaction->invoices as $invoice)
                                <!--begin::Product-->
                                <div class="col-md-4 col-xxl-4 col-lg-12">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded bg-light text-center">
                                                    <img src="{{asset($invoice->image)}}"
                                                         alt="" class="mw-100 w-200px">
                                                </div>
                                                <div class="overlay-layer">
                                                    <a data-fancybox="gallery"
                                                       data-caption="{{$invoice->note}}"
                                                        href="{{asset($invoice->image)}}"
                                                       class="btn font-weight-bolder btn-sm btn-primary mr-2">
                                                        للمعاينة
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-center mt-5">
                                                <span class="font-size-lg">{{$invoice->note}}</span>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end::Product-->
                            @endforeach

                        </div>
                        <!--end::Products-->
                    </div>
                </div>
            </div>
            <!-- end::Card-->
        </div>
        <!--end::Entry-->

    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fancybox/css/fancybox.css')}}">
    <style>

    </style>
@endpush
@push('scripts')
    <script src="{{asset('assets/fancybox/js/fancybox.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            Fancybox.bind('[data-fancybox="gallery"]', {
                //
            });
        });
    </script>
@endpush
