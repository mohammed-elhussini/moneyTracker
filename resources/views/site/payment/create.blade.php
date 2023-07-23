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
                        <h5 class="text-dark font-weight-bold my-1 mr-5"> قسم جديد</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}" class="text-muted">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('payment.index')}}" class="text-muted">طرق الدفع</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="text-muted">طريقة دفع جديدة</span>
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
                    <!--begin::Body-->
                    <div class="card-header">
                        <h3 class="card-title">
                            طريقة دفع جديدة
                        </h3>
                    </div>
                    <!--begin::Form-->
                    <form method="post"
                          action="{{route('payment.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="d-block">صورة طريقة دفع  :</label>
                                <div class="image-input image-input-outline"
                                     id="kt_image_avatar"
                                     style="background-image: url({{asset('/assets/media/users/blank.png') }})">
                                    <div class="image-input-wrapper"
                                         style="background-image: url({{asset('/assets/media/users/blank.png') }})"></div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change"
                                        data-toggle="tooltip"
                                        title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file"
                                               name="icon"
                                               accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="icon_remove"/>
                                    </label>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel"
                                        data-toggle="tooltip"
                                        title="Cancel avatar">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="remove"
                                        data-toggle="tooltip"
                                        title="Remove avatar">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>
                                </div>

                                @error('icon')
                                <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="catName">إسم طريقة دفع  <span class="text-danger">*</span></label>
                                <input type="text"
                                       id="catName"
                                       class="form-control  @error('name')is-invalid @enderror"
                                       name="name"
                                       placeholder="الرجاء كتابة إسم طريقة دفع"
                                       value="{{old('name')}}"/>

                                @error('name')
                                <div class="form-text invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="catDes">الوصف </label>
                                <textarea id="kt-tinymce-2"
                                          name="description"
                                          class="tox-target  @error('name')is-invalid @enderror">{{old('description')}}</textarea>
                                @error('description')
                                <div class="form-text invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit"
                                    class="btn btn-primary mr-2">
                                حفظ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/editors/tinymce.js')}}"></script>
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
            var avatar5 = new KTImageInput('kt_image_avatar');

            avatar5.on('cancel', function (imageInput) {
                swal.fire({
                    title: 'Image successfully changed !',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Awesome!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });

            avatar5.on('change', function (imageInput) {
                swal.fire({
                    title: 'Image successfully changed !',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Awesome!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });

            avatar5.on('remove', function (imageInput) {
                swal.fire({
                    title: 'Image successfully removed !',
                    type: 'error',
                    buttonsStyling: false,
                    confirmButtonText: 'Got it!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });
            // Initialization
            KTTinymce.init();
            // Initialization
            KTSelect2.init();
        });
    </script>
@endpush
