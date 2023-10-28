
<!-- Footer -->
<footer>
    <div class="content-wrapper">
        <div class="left p-2">
            <a href="#" class="d-flex align-items-center">
                <img src="{{asset('web/assets/images/logo/footer-logo.png')}}"  height="90"/>
            </a>
            <p class="text-white" id="descWebsite">

            </p>
        </div>

        <div class="right">
            <div class="row">

                <div class="col-md-3">
                    <h5>{{__('website.Pages')}}</h5>
                    <ul class="nav flex-column p-0">
                        <li class="nav-item"><a href="{{url('/')}}" class="nav-link p-0">{{__('website.Home')}}</a></li>
                        <li class="nav-item"><a href="{{url('about')}}" class="nav-link p-0">{{__('website.About')}}</a></li>
                        <li class="nav-item"><a href="{{url('contact')}}" class="nav-link p-0">{{__('website.Contact us')}}</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h5>{{__('website.Our Services')}}</h5>
                    <ul class="nav flex-column p-0"  id="ServicesContainer">

                    </ul>
                </div>

{{--                <div class="col-md-2">--}}
{{--                    <h5>{{__('website.Our Projects')}}</h5>--}}
{{--                    <ul class="nav flex-column p-0" id="ProjectsContainer">--}}

{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-md-2">--}}
{{--                    <h5>{{__('website.Our Products')}}</h5>--}}
{{--                    <ul class="nav flex-column p-0" id="ProductsContainer">--}}

{{--                    </ul>--}}
{{--                </div>--}}

                <div class="col-md-3">
                    <h5>{{__('website.Follow us')}}</h5>
                    <ul class="nav flex-column p-0">
                        <li class="nav-item"><a href="#" target="_blank" class="nav-link p-0" id="facebook" ><span class="icon icon-facebook"></span>{{__('website.Facebook')}}</a></li>
                        <li class="nav-item"><a href="#" target="_blank"  class="nav-link p-0" id="twitter"><span class="icon icon-twitter"></span>{{__('website.Twitter')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <br>


                    <img src="{{asset('web/assets/images/qr-code.png')}}"  height="90"/>
                </div>


            </div>
            <hr>
            <div class="copyright text-center">
                <p>Copyright © 2023 Dpfit  All Rights Reserved.</p>
            </div>

            <a href="#" class="float" target="_blank" id="whatsappLink">
               <img src="{{asset('web/assets/images/whatsapp.png')}}" width="60" alt="whatsapp" class="rounded-circle">
            </a>
            <style>
                .float{
                    position:fixed;
                    width:60px;
                    height:60px;
                    bottom:40px;
                    right:40px;
                    background-color:#2da639;
                    color:#FFF;
                    border-radius:50px;
                    text-align:center;
                    font-size:30px;
                    box-shadow: 2px 2px 3px #999;
                    z-index:100;
                }
                #whatsappLink:hover {
                    transform: translateY(-10px);
                }

                #whatsappLink{
                    transition: transform 250ms;
                }

            </style>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('web/assets/vendor/jquery/js/jquery-3.6.1.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var base_url = window.location.origin;
            $.ajax({
                type: "GET",
                url: "{{route('getAllFooterData')}}",
                cache: false,
                data: null,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.data) {
                        console.log("getAllFooterData",data.data);

                            var services=data.data.services;
                            var products=data.data.products;
                            var projects=data.data.projects;
                            $("#facebook").attr('href',data.data.facebook)
                            $("#whatsappLink").attr('href',data.data.whatsapp)
                            $("#twitter").attr('href',data.data.twitter)
                            $("#descWebsite").html(data.data.description_ar)

                            if (services.length > 0) {
                                for (let ii = 0; ii < services.length; ii++) {

                                    $("#ServicesContainer").append(
                                        '<li class="nav-item"><a href="#" class="nav-link p-0">' + services[ii]['name_ar'] + '</a></li>'
                                    );
                                }
                            }  if (products.length > 0) {
                                for (let iip = 0; iip < products.length; iip++) {
                                    $("#ProductsContainer").append(
                                        '<li class="nav-item"><a href="#" class="nav-link p-0">' + products[iip]['name_ar'] + '</a></li>'
                                    );
                                }
                            }
                            if (projects.length > 0) {
                                for (let iipp = 0; iipp < projects.length; iipp++) {
                                    $("#ProjectsContainer").append(
                                        '<li class="nav-item"><a href="#" class="nav-link p-0">' + projects[iipp]['name_ar'] + '</a></li>'
                                    );
                                }
                            }


                    }
                },
                fail: function (Error) {
                    console.log(Error)
                }
            });


        });
    </script>
</footer>
