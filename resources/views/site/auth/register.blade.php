
<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->
<head><base href="../../../../">
    <meta charset="utf-8"/>
    <title>Money Tracker</title>
    <meta name="description" content="Page with empty content"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!--begin::Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Marhey:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{asset('assets/css/pages/login/classic/login-5.rtl.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
             style="background-image: url({{asset('assets/media/bg/bg-2.jpg')}});">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                        <img src="{{asset('assets/media/logos/logo-letter-13.png')}}"
                             class="max-h-75px"
                             alt="" />

                </div>
                <!--end::Login Header-->

                <!--begin::Login Sign up form-->
                <div class="login-signup">
                    <div class="mb-20">
                        <h3 class="opacity-40 font-weight-normal">إانشاء حساب جديد</h3>
                    </div>
                    <form class="form text-center"
                          method="post"
                          action="{{route('register.action')}}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('username') is-invalid @enderror"
                                   type="text"
                                   placeholder="إسم المستخدم"
                                   name="username" />
                            @error('username')
                            <div class="form-text invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror"
                                   type="text"
                                   placeholder="البريد الالكترونى"
                                   name="email"
                                   autocomplete="on" />
                            @error('email')
                            <div class="form-text invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror"
                                   type="password"
                                   placeholder="كلمة السر"
                                   name="password" />
                            @error('password')
                            <div class="form-text invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                                   type="password"
                                   placeholder="تأكيد كلمة السر"
                                   name="password_confirmation" />
                            @error('password_confirmation')
                            <div class="form-text invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">
                                تسجيل جديد
                            </button>
                            <a class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2" href="{{route('login')}}">
                                تسجيل دخول
                            </a>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign up form-->

            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->

</body>
<!--end::Body-->
</html>
