<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @if(session()->get('locale') == 'en') direction="ltr" style="direction: ltr;" @else direction="rtl" style="direction: rtl;" @endif >
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>Dpfit البرمجة الرقمية لتقنية المعلومات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bandar Al Debeyan ">
    <meta name="keywords" content="Bandar Al Debeyan Author">
    <meta name="author" content="Bandar Al Debeyan">
    <link rel="icon" href="web/assets/images/logo/logo-color.png" type="image/x-icon">
    <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=">

    <meta name="author" content="">
    <meta name="robots" content="noindex,nofollow">
    <meta name="twitter:image" property="og:image" content=""/>
    <!-- invalid, but expected -->
    <link property="image" href=""/>
    <meta property="og:image" name="twitter:image" content=""/>

    <meta property="og:url" content=""/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Dpfit"/>
    <meta property="og:description" content="Dpfit | Software Services"/>
    <meta property="og:image" content=""/>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">


  <link href="web/assets/images/logo/logo-color.png" rel="shortcut icon" type="image/png" />

    <link rel="icon" type="image/x-icon" href="{{asset('web/assets/images/favicon.ico')}}">
    <!----------------------------------- Bootstrap ---------------------------------------->
    <link rel="stylesheet" href="{{asset('web/assets/vendor/bootstrap/css/bootstrap.min.css')}}" />
    <!----------------------------------- Bootstrap Select --------------------------------->
    <link rel="stylesheet" href="{{asset('web/assets/vendor/bootstrap-select/css/bootstrap-select.min.css')}}" />
    <!----------------------------------- Owl Carousel ------------------------------------->
    <link rel="stylesheet" href="{{asset('web/assets/vendor/owlcarousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/vendor/owlcarousel/css/owl.theme.default.min.css')}}">
    <!----------------------------------- Main --------------------------------------------->


    @if(session()->get('locale') == 'en')
    <link rel="stylesheet" href="{{asset('web/assets/css/en-styles.css')}}" />
    @else
        <link rel="stylesheet" href="{{asset('web/assets/css/ar-styles.css')}}" />
    @endif
    <style>
        *{
            font-family: 'Cairo', sans-serif!important;
            font-weight: 700!important;
        }
    </style>

    @yield('style')

</head>
<body class="noscroll">

<!-- Preloader -->
<div class="preloader"></div>


@include('../web/componants.header')
@yield('content')
@include('../web/componants.footer')



<!------------------------------ JQuery ------------------------------------>
<script type="text/javascript" src="{{asset('web/assets/vendor/jquery/js/jquery-3.6.1.min.js')}}"></script>
<!------------------------------ Bootstrap --------------------------------->
<script type="text/javascript" src="{{asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!------------------------------ Lazyload ---------------------------------->
<script type="text/javascript" src="{{asset('web/assets/vendor/lazyload/js//lazyload.min.js')}}"></script>
<!------------------------------ Bootstrap Select -------------------------->
<script type="text/javascript" src="{{asset('web/assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<!------------------------------ Owl Carousel ------------------------------>
<script type="text/javascript" src="{{asset('web/assets/vendor/owlcarousel/js/owl.carousel.min.js')}}"></script>
<!----------------------------------- Datatables ------------------------------------->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<!------------------------------- Main ------------------------------------->
<script type="text/javascript" src="{{asset('web/assets/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/v4-shims.min.js" integrity="sha512-6n3X18GAJomziz6HVPbmyBOEZeoB8+unwEBTRXFs3IZTRYYCkbXNAWNV68uHujamEvDBqaGe2FTW19o81h1/RA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @yield('java_script')
</body>
</html>
