
(function ($) {
    "use strict";

    $(window).scroll(function(){
        if ($(window).scrollTop() >= 10) {
            $('nav').addClass('sticky-header');
        }
        else {
            $('nav').removeClass('sticky-header');
        }
    });

    // Clients Carousel [Home]
    $('#clients-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        rtl:true,
        autoplay:true,
        autoplayTimeout:1500,
        autoplayHoverPause:true,
        responsive: {
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });

    // Orders Carousel [Profile]
    $('.orders-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        rtl:true,
        autoplay:true,
        autoplayTimeout:1500,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    })

    // Projects Table
    let table = new DataTable('#projectsTable', {
        responsive: true
    });

    // Cart Table
    let cartTable = new DataTable('#cartTable', {
        responsive: true
    });

})(jQuery);
