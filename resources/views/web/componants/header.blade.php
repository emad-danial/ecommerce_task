
<!-- Header -->
<header style="display: block">
    <nav class="navbar navbar-expand-lg navbar-light responsive">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{asset('web/assets/images/logo/logo.png')}}" class="img-fluid" />
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Pages -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">{{__('website.Home')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">{{__('website.About')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('services')}}">{{__('website.Our Services')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('projects')}}">{{__('website.Our Projects')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('products')}}">{{__('website.Our Products')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact')}}">{{__('website.Contact us')}}</a>
                    </li>
                    <li class="nav-item">
                        @guest
                            <a class="nav-link" href="{{url('loginForm')}}"><span>{{__('website.login')}}</span><span class="icon-login"></span></a>
                        @else
                        <a class="nav-link" href="{{ url('my-account') }}">{{ Auth::user()->name }} <span class="icon-user"></span></a>
                        @endguest


                    </li>
                </ul>
            </div>
            <div class="navbar-right">
{{--                <a href="#"><span class="icon-cart"></span></a>--}}

                @if(session()->get('locale') == 'en')
                    <a href="{{url('lang','ar') }}"><img src="{{asset('web/assets/images/saudi.png')}}" class="img-fluid" width="50" height="50"></img></a>
                @else
                    <a href="{{url('lang','en') }}"><img src="{{asset('web/assets/images/english.png')}}" class="img-fluid" width="50" height="50"></img></a>
                @endif




            </div>
        </div>
    </nav>
</header>
