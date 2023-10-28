{{--start of body content --}}
    @include('admin.components.body.body_content')
{{-- end of body content--}}

{{-- start of body sideBar --}}
    @include('admin.components.body.sidebar_menu')
{{-- end of body sideBar --}}

{{--start of top menu--}}
    @include('admin.components.body.top_menu')
{{--end of top menu --}}


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

   @yield('content')

</div>

