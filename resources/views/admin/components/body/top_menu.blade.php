<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@yield('header_title')</h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4">@yield('header_sub_title')</span>
            <!--end::Actions-->
        </div>
        <!--end::Info-->
        <div class="topbar header-menu-wrapper-right">
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </button>
                        <div class="dropdown-menu">
                            <p class="pt-2 ">
                                &nbsp; <a href="{{url('/adminPanel/signout')}}" class="pr-2 text-secondary">
                                    <i class="fa fa-chart-line" aria-hidden="true"></i>
                                    تسجيل خروج
                                </a></p>
                        </div>
                    </div>


{{--                  --}}
{{--                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">{{auth()->user()->name}}</span>--}}
{{--                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">--}}
{{--                            <span class="symbol-label font-size-h5 font-weight-bold">S</span>--}}
{{--                    </span>--}}
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
