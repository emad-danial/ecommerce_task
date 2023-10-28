<!DOCTYPE html>
<html lang="en"
      <?php $Is_Rtl=env('admin_is_rtl',true);?>
      <?php if($Is_Rtl): ?> direction="rtl" style="direction: rtl;"   <?php endif; ?>
<!--begin::Head-->
	<head>
        {{--  Required meta tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="shortcut icon" href="{{url('/')}}/Admin/assets/media/logos/favicon.ico"/>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <title>{{$meta_title ?? ''}}</title>
        @include('admin.components.header.header_components')
        @stack('custom-css')
        <style>
            .setting-box{
                margin: auto;
                background: white;
                border-radius: 10px;
                padding: 20px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px
            }
        </style>

	</head>

<!--end::Head-->
