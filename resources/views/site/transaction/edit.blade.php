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
                            تعديل فاتورة
                            {{$transaction->name}}
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
                                    تعديل فاتورة
                                   {{$transaction->name}}
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
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Form-->
                <form class="form"
                      method="post"
                      action="{{route('transaction.update',$transaction->id)}}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-8">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        تعديل فاتورة
                                        {{$transaction->name}}
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>عنوان الفاتورة:</label>
                                        <input type="text"
                                               class="form-control form-control-solid @error('name')is-invalid @enderror"
                                               placeholder="عنوان الفاتورة"
                                               name="name"
                                               value="{{old('name',$transaction->name)}}"/>
                                        @error('name')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>الوصف:</label>
                                        <textarea id="kt-tinymce-2"
                                                  name="description"
                                                  class="@error('description')is-invalid @enderror">{{old('description',$transaction->description)}}</textarea>
                                        @error('description')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>تاريخ الفاتورة</label>
                                        <input type="text"
                                               class="form-control form-control-solid flatpickr @error('cost')is-invalid @enderror"
                                               id="kt_datepicker_1_modal"
                                               readonly="readonly"
                                               placeholder="تاريخ الفاتورة"
                                               name="transaction_date"
                                               value="{{old('transaction_date',$transaction->transaction_date)}}"/>

                                        @error('transaction_date')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>التكلفة</label>
                                        <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number"
                                                   class="form-control form-control-solid @error('cost')is-invalid @enderror"
                                                   name="cost"
                                                   value="{{old('description',$transaction->cost)}}"
                                                   placeholder="99.9"/>
                                            @error('cost')
                                            <div class="form-text invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::col-->
                        <div class="col-lg-4">
                            <div class="card card-custom gutter-b">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>القسم:</label>
                                        <div class="checkbox-list">
                                            @foreach($categories as $cat)
                                                <label class="checkbox">
                                                    <input type="checkbox"
                                                           name="categories[]"
                                                           value="{{ $cat->id }}"
                                                        @checked(in_array($cat->id, $transaction->categories->pluck('id')->toArray()))>
                                                    <span></span>
                                                    {{$cat->name}}
                                                </label>
                                            @endforeach

                                            @error('categories[]')
                                            <div class="form-text invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="separator separator-solid my-7"></div>
                                    <div class="form-group">
                                        <label>طرق الدفع:</label>
                                        <div class="radio-list">
                                            @foreach($payments as $payment)
                                                <label class="radio">
                                                    <input type="radio"
                                                           name="payment_id"
                                                           value="{{ $payment->id }}"
                                                        @checked($transaction->payment_id == $payment->id)>
                                                    <span></span>
                                                    {{$payment->name}}
                                                </label>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="separator separator-solid my-7"></div>
                                    <div class="form-group">
                                        <label> نوع المعاملة:</label>
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio"
                                                       name="type"
                                                       value="income"
                                                    @checked($transaction->type === 'income')/>
                                                <span></span>
                                                income
                                            </label>

                                            <label class="radio radio-danger">
                                                <input type="radio"
                                                       name="type"
                                                       value="expensive"
                                                    @checked($transaction->type === 'expensive')/>
                                                <span></span>
                                                expensive
                                            </label>

                                            @error('type')
                                            <div class="form-text invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::col-->
                        <div class="col-md-12 gallery">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">

                                <div class="card-body">
                                    <h3 class="card-title">
                                        الوصلات
                                    </h3>
                                    <div class="alert alert-danger" role="alert">
                                        تعديل الملاحظات لا يعمل
                                    </div>

                                    <div class="row">
                                        @foreach($transaction->invoices as $invoice)
                                            <!--begin::Product-->
                                            <div class="col-md-3 mb-5">
                                                <!--begin::Card-->
                                                <div class="card-item border-dark">
                                                    <label class="checkbox checkbox-danger align-items-start">
                                                        <input type="checkbox"
                                                               name="selected_images[]"
                                                               value="{{ $invoice->id }}">
                                                        <span class="icon-xl la la-trash-alt p-5"></span>
                                                        <div class="ml-3">
                                                            <!--begin::Image-->
                                                            <div class="overlay">
                                                                <div
                                                                    class="overlay-wrapper rounded bg-light text-center">
                                                                    <img src="{{asset($invoice->image)}}"
                                                                         alt=""
                                                                         class="mw-100 w-200px">
                                                                </div>
                                                                <div class="overlay-layer">
                                                                    <a href="#"
                                                                       class="btn font-weight-bolder btn-sm btn-primary mr-2">
                                                                        للمعاينة
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!--end::Image-->
                                                            <!--begin::Details-->
                                                            <textarea class="form-control"
                                                                      placeholder="الملاحظة"
                                                                      name="notes[]">{{old('notes',$invoice->note)}}</textarea>
                                                            <!--end::Details-->
                                                        </div>
                                                    </label>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->
                                        @endforeach
                                    </div>
                                    <div class="data-repeater-list">
                                        <div class="add-repeater-item btn btn-sm font-weight-bolder btn-light-primary">
                                            إضافة
                                            عنصر جديد
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::col-->
                    </div>
                    <!--end::row-->

                    <div class="card-footer">
                        <button type="submit"
                                class="btn btn-primary btn-lg btn-block">
                            تعديل
                        </button>
                    </div>
                </form>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </section>

@endsection
@push('styles')
    <!-- dropify -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dropify/css/dropify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/flatpickr/css/flatpickr.min.css')}}">
    <style>
        .gallery .checkbox > input:checked ~ span:after {
            border: none;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{asset('assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/editors/tinymce.js')}}"></script>

    <script src="{{asset('assets/flatpickr/js/flatpickr.js')}}"></script>

    <script src="{{asset('assets/dropify/js/dropify.js')}}"></script>

    <script>
        // tinymce
        var KTTinymce = function () {
            // Private functions
            var demos = function () {
                tinymce.init({
                    selector: '#kt-tinymce-2',
                    menubar: true,
                    toolbar: ['styleselect fontselect fontsizeselect',
                        'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                        'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],
                    plugins: 'advlist autolink link image lists charmap print preview code'
                });
            }
            return {
                // public functions
                init: function () {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function () {
            // Initialization
            KTTinymce.init();
            // dropify
            $('.dropify').dropify();
            //flatpickr
            $(".flatpickr").flatpickr({
                altInput: true,
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            //repeater
            let i = 1;
            jQuery('.add-repeater-item').on('click', function () {
                i = i + 1;
                let repeaterItem =
                    '<div class="data-repeater-item">' +
                    '<div class="row">' +
                    '<div class="col-md-5">' +
                    '<input class="form-control" type="file" name="images[]">' +
                    '</div>' +
                    '<div class="col-md-5">' +
                    '<div class="form-group">' +
                    '<textarea class="form-control" placeholder="الملاحظة" name="notes[]"></textarea>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<a href="javascript:;" class="delete-item btn btn-sm font-weight-bolder btn-light-danger">' +
                    '<i class="la la-trash-o"></i> حذف العنصر' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                jQuery(repeaterItem).insertBefore(this);
            });

            // Delete item repeater
            jQuery(document).on('click', '.delete-item', function () {
                jQuery(this).parents('.data-repeater-item').remove();
            });

        });
    </script>
@endpush
