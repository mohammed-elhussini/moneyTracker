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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">الملف الشخصى</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}" class="text-muted">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('profile')}}" class="text-muted">الملف الشخصى</a>
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


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-12">
                        <!--begin::Nav Panel Widget 1-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <ul class="nav nav-tabs dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row"
                                    id="myTab"
                                    role="tablist">
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link active border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                           id="profile-tab"
                                           data-toggle="tab"
                                           href="#profile"
                                           aria-controls="profile">
                                            <span class="nav-icon py-2 w-auto">
																<span class="svg-icon svg-icon-3x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<polygon
                                                                                points="0 0 24 0 24 24 0 24"></polygon>
																			<path
                                                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3"></path>
																			<path
                                                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                                fill="#000000"
                                                                                fill-rule="nonzero"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
															</span>
                                            <span class="nav-text">الملف الشخصى</span>
                                        </a>
                                    </li>

                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                           id="contact-tab"
                                           data-toggle="tab"
                                           href="#password"
                                           aria-controls="password">
                                           <span class="nav-icon py-2 w-auto">
																<span class="svg-icon svg-icon-3x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24"
                                                                                  height="24"></rect>
																			<rect fill="#000000" x="4" y="4" width="7"
                                                                                  height="7" rx="1.5"></rect>
																			<path
                                                                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                                                fill="#000000" opacity="0.3"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
															</span>
                                            <span class="nav-text">تغير كلمة المرور</span>
                                        </a>
                                    </li>

                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                           id="contact-tab"
                                           data-toggle="tab"
                                           href="#category"
                                           aria-controls="category">
                                           <span class="nav-icon py-2 w-auto">
																<span class="svg-icon svg-icon-3x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24"
                                                                                  height="24"></rect>
																			<rect fill="#000000" x="4" y="4" width="7"
                                                                                  height="7" rx="1.5"></rect>
																			<path
                                                                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                                                fill="#000000" opacity="0.3"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
															</span>
                                            <span class="nav-text">
                                                الأقسام
                                            {{$userCats->count()}}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-5"
                                     id="myTabContent">
                                    <div class="tab-pane fade active show"
                                         id="profile"
                                         role="tabpanel"
                                         aria-labelledby="profile-tab">
                                        <form class="form"
                                              method="post"
                                              action="{{ route('profile.profile_update') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="d-block">الصورة الشخصية :</label>

                                                        <div class="image-input image-input-outline"
                                                             id="kt_image_avatar"
                                                             style="background-image: url({{asset('/assets/media/users/blank.png') }})">
                                                            <div class="image-input-wrapper"
                                                                 style="background-image: url('{{$user->avatar ? asset($user->avatar) : asset('/assets/media/users/blank.png') }}')"></div>
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change"
                                                                data-toggle="tooltip"
                                                                title=""
                                                                data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file"
                                                                       name="avatar"
                                                                       accept=".png, .jpg, .jpeg"/>
                                                                <input type="hidden" name="avatar_remove"/>

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


                                                    @error('avatar')
                                                    <div class="form-text invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>

                                                <div class="form-group">
                                                    <label>إسم المستخدم:</label>
                                                    <input type="text"
                                                           class="form-control @error('username') is-invalid @enderror"
                                                           placeholder="إسم المستخدم بالكامل"
                                                           name="username"
                                                           value="{{old('username',$user->username)}}">

                                                    @error('username')
                                                    <div class="form-text invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>

                                                <div class="form-group">
                                                    <label>البريد الألكترونى:</label>
                                                    <input type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           placeholder="البريد الألكترونى"
                                                           name="email"
                                                           value="{{old('email',$user->email)}}">
                                                    @error('email')
                                                    <div class="form-text invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>

                                                <div class="form-group">
                                                    <label>الهاتف</label>
                                                    <input type="tel"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           placeholder="الهاتف"
                                                           name="phone"
                                                           value="{{old('phone',$user->phone)}}"/>
                                                    @error('phone')
                                                    <div class="form-text invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>

                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary mr-2">تعديل</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade"
                                         id="password"
                                         role="tabpanel"
                                         aria-labelledby="password-tab">
                                        <form class="form" method="post" action="{{ route('profile.password_update') }}">
                                            @csrf
@method('PUT')
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>كلمة المرور الحالية:</label>
                                                    <input type="password"
                                                           class="form-control @error('new_password') is-invalid @enderror"
                                                           placeholder="كلمة المرور الحالية"
                                                           name="old_password">
                                                    <span class="form-text text-muted">برجاء كلمة المرور</span>
                                                    @error('old_password')
                                                    <div class="form-text invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>

                                                <div class="form-group">
                                                    <label>كلمة المرور الجديدة:</label>
                                                    <input type="password"
                                                           class="form-control @error('new_password') is-invalid @enderror"
                                                           placeholder="كلمة المرور الجديدة"
                                                           name="new_password">
                                                    <span class="form-text text-muted">برجاء كلمة المرور</span>
                                                    @error('new_password')
                                                    <div class="form-text invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>

                                                <div class="form-group">
                                                    <label>تأكيد كلمة المرور الجديدة:</label>
                                                    <input type="password"
                                                           class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                                           placeholder="تأكيد كلمة المرور الجديدة"
                                                           name="new_password_confirmation">
                                                    @error('new_password_confirmation')
                                                    <div class="form-text invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary mr-2">تعديل</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade" id="category" role="tabpanel"
                                         aria-labelledby="category-tab">
                                        @foreach($userCats as $cat)
                                        <div class="d-flex align-items-center mb-10">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<img
                                                                src="{{$cat->icon}}"
                                                                class="h-75 align-self-end"
                                                                alt="{{$cat->name}}">
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                                <a href="{{route('category.show',$cat->id)}}"
                                                   class="text-dark text-hover-primary mb-1 font-size-lg">
                                                    {{$cat->name}}
                                                </a>
                                                <span class="text-muted">
                                                    {!! $cat->description !!}
                                                </span>
                                            </div>
                                            <!--end::Text-->
                                            <span
                                                class="font-weight-bolder label label-xl label-light-info label-inline py-5 min-w-45px">
                                                {{ $cat->transactions->count()}}
                                            </span>

                                            <span
                                                class="font-weight-bolder label label-xl label-light-success label-inline px-3 py-5 min-w-45px">2.8</span>

                                            <span
                                                class="font-weight-bolder label label-xl label-light-danger label-inline px-3 py-5 min-w-45px">582</span>

                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--begin::Nav Panel Widget 1-->
                    </div>
                </div>
                <!--end::Row-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->


        <!--end::Entry-->
    </section>
@endsection


@push('scripts')
    <script>
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
    </script>
@endpush
