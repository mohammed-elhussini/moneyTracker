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
                            فاتورة جديدة
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
                                     فاتورة جديدة
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!--begin::Form-->
                <form class="form"
                      method="post"
                      action="{{route('transaction.store')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        فاتورة جديدة
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>عنوان الفاتورة:</label>
                                        <input type="text"
                                               class="form-control form-control-solid @error('name')is-invalid @enderror"
                                               placeholder="عنوان الفاتورة"
                                               name="name"
                                               value="{{old('name')}}"/>
                                        @error('name')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>الوصف:</label>
                                        <textarea id="kt-tinymce-2"
                                                  name="description"
                                                  class="@error('description')is-invalid @enderror">{{old('description')}}</textarea>
                                        @error('description')
                                        <div class="form-text invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>تاريخ الفاتورة</label>
                                        <input type="text"
                                               class="form-control form-control-solid flatpickr @error('transaction_date')is-invalid @enderror"
                                               id="kt_datepicker_1_modal"
                                               readonly="readonly"
                                               placeholder="تاريخ الفاتورة"
                                               name="transaction_date"
                                               value="{{old('transaction_date')}}"/>

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
                                                   value="{{old('cost')}}"
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
                                                           value="{{ $cat->id }}">
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
                                    <div class="form-group validated">
                                        <label>طرق الدفع:</label>
                                        <div class="radio-list">
                                            @foreach($payments as $payment)
                                                <label class="radio">
                                                    <input type="radio"
                                                           name="payment_id"
                                                           value="{{ $payment->id }}">
                                                    <span></span>
                                                    {{$payment->name}}
                                                </label>
                                            @endforeach

                                            @error('payment_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="separator separator-solid my-7"></div>
                                    <div class="form-group validated">
                                        <label> نوع المعاملة:</label>
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio"
                                                       name="type"
                                                       value="income"/>
                                                <span></span>
                                                income
                                            </label>

                                            <label class="radio radio-danger">
                                                <input type="radio"
                                                       name="type"
                                                       value="expensive"/>
                                                <span></span>
                                                expensive
                                            </label>

                                            @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
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
                                        عند اضافه وصل بدون ملاحظه لا يتم الحفظ
                                    </div>

                                    <div class="data-repeater-list">
                                        <div class="add-repeater-item btn btn-sm font-weight-bolder btn-light-primary">
                                            إضافة وصل جديد
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
                            حفظ
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

            //flatpickr
            $(".flatpickr").flatpickr({
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
                    '<input class="form-control @error('images.*')is-invalid @enderror" type="file" name="images[]"> @error('images.*') <div class="invalid-feedback">{{ $message }}</div> @enderror' +
                    '</div>' +
                    '<div class="col-md-5">' +
                    '<div class="form-group">' +
                    '<textarea class="form-control @error('notes.*')is-invalid @enderror" placeholder="الملاحظة" name="notes[]"></textarea> @error('notes.*') <div class="invalid-feedback">{{ $message }}</div> @enderror' +
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
