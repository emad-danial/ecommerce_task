{{-- start of footer box --}}
    @include('admin.components.footer.footer_box')
{{-- end of footer box--}}

{{--start of scrolltop--}}
    @include('admin.components.footer.scrolltop')
{{--end of scrolltop--}}

{{--start Global Theme Bundle(used by all pages)--}}
    @include('admin.components.footer.footer_scripts_files')
{{--end Global Theme Bundle(used by all pages)--}}


{{--start of additional_js--}}
    @yield('scripts')
    @stack('custom-scripts')
{{--end of additional_js--}}

	</body>

</html>
