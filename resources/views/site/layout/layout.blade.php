@include('site.partials.header')

<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        @include('site.partials.aside')
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
         @include('site.partials.headerTop')
            <!--end::Header-->
            <!--begin::Content-->

            @yield('content')
            <!--end::Content-->

@include('site.partials.footer')
