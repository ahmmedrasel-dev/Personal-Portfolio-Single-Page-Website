$(function () {

    "use strict";

//=====TYPE/HEADLINE=====





//===========MENU FIX===========
var navoff = $('.main_menu').offset().top;

$(window).scroll(function () {
    var scrolling = $(this).scrollTop();

    if (scrolling > navoff) {
        $('.main_menu').addClass('menu_fix');
    } else {
        $('.main_menu').removeClass('menu_fix');
    }
});



//*==========SIDE MENU==========
$('.menu_icon').on('click', function(){
        $('.side_menu').addClass('.menu_show');
    });

    $('.close_icon').on('click', function(){
        $('.side_menu').removeClass('.menu_show');
});



 //=====BAR FILLER=====
 $(document).ready(function(){

    $('#bar1').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar2').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar3').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar4').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar5').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar6').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar7').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar8').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar9').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar10').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar11').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });

    $('#bar12').barfiller({ barColor: 'linear-gradient(98deg, rgba(221,36,118,1) 0%, rgba(242,30,78,1) 100%)', duration: 3000 });
    });



//*==========ISOTOPE==============
var $grid = $('.grid').isotope({});

$('.portfolio_filter').on('click', 'button', function () {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({
        filter: filterValue
    });
});

//active class
$('.portfolio_filter button').on("click", function (event) {

    $(this).siblings('.active').removeClass('active');
    $(this).addClass('active');
    event.preventDefault();

});



//*==========wow.js===============
    new WOW().init();



//*==========PARALLEX START============
    var scene = document.getElementById('scene');
    var parallaxInstance = new Parallax(scene);



//*==========COUNTER START===========
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1500
        });
    });



//*==========TEAM SLIDER===========
    $('.team_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        Arrows: true,
        nextArrow: '<i class="fas fa-chevron-right nxt_arr"></i>',
        prevArrow: '<i class="fas fa-chevron-left prv_arr"></i>',

       responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false,
            arrows: false,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
          }
        }
       ]
    });



//*==========TESTIMONIAL SLIDER=========
    $('.testi_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        arrows: false,

       responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
          }
        }
       ]
    });



//*==========jquery-image-scroll.js==========
    $( window ).on( 'load', function(){
        $( '.screen' ).scrollImage();
    })



//*==========SCROLL BUTTON==========
    $('.scroll_btn').on('click', function(){
        $('html, body').animate({
            scrollTop: 0,
        }, 3000);
    });

    $(window).on('scroll', function(){
        var scrolling = $(this).scrollTop();

        if(scrolling > 300){
            $('.scroll_btn').fadeIn();
           }

        else{
            $('.scroll_btn').fadeOut();
        }
    });




/*==========WINDOW SOCIAL BUTTON==========*/
    $('.menu_btn').on('click', function(){
        $('.icon_list').toggleClass('.menu_slide');
    });

    $('.menu_btn').on('click', function(){
        $('#arrow_icon').toggleClass('.btn_roatet');
    });





});
