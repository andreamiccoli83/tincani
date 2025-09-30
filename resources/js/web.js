window.$ = window.jQuery = require('jquery');

window.FontAwesomeConfig = { autoReplaceSvg: false };
require('@fortawesome/fontawesome-free/js/all');
require('slick-slider/slick/slick');
require('slick-lightbox/dist/slick-lightbox');
require('moment/moment');
//require('fullcalendar/dist/fullcalendar.min');








$('.hamburger').on('click', function () {
    //Evento che al click aggiunge la classe active al menu Hamburger
    var $this = $(this);
    $('body').toggleClass('menu-open');
    $(this).toggleClass('is-active');
    $('.menu-list').toggleClass('close-menu');

});


$(document).ready(function(){
    var height_footer = $('footer').height();
    $('.content-wrap').css('padding-bottom', height_footer);

    $('.slider-main').slick({
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        dots: true,
        autoplay: true,
        speed: 500
    });


    $('.slider-book').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        speed: 500,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    centerMode: true,

                }
            },
            {
                breakpoint: 0,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    variableWidth: true,
                }
            }


        ],
        prevArrow: $('.arrow-left2'),
        nextArrow: $('.arrow-right2')
    });

    $('.slider-music').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        speed: 500,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    centerMode: true,

                }
            },
            {
                breakpoint: 0,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    variableWidth: true
                }
            }


        ],
        prevArrow: $('.arrow-left3'),
        nextArrow: $('.arrow-right3')

    });

    $('.slider-music-details').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        centerMode: true,
        speed: 500,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 2,
                    centerMode: true

                }
            },
            {
                breakpoint: 0,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    variableWidth: true,
                }
            }


        ],
        prevArrow: $('.arrow-left2'),
        nextArrow: $('.arrow-right2')
    });

    $('.content-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        centerMode: true,
        speed: 500,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 2,
                    centerMode: true

                }
            },
            {
                breakpoint: 0,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    variableWidth: true,
                }
            }


        ],
        prevArrow: $('.arrow-left'),
        nextArrow: $('.arrow-right')
    });

    $('.content-slider').slickLightbox({
        src: 'src',
        itemSelector: '.lightbox',
        navigateByKeyboard  : true
    });

    searchNews();
    searchEvents();



    // using CommonJS modules
    var lozad = require('lozad');
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();

    function searchNews() {
        $(".input-search-sidebar-news").on("input", function () {
            var value = $(this).val();
            if (value.length > 3) {
                $(".single-news").each(function (i, html) {
                    var _this = $(this);
                    var title = $(html).find(".title").text();
                    var description = $(html).find(".description").text();

                    console.log(title, description);

                    (title.indexOf(value) >= 0 || description.indexOf(value) >= 0) ? _this.css('display', 'block') : _this.css('display', 'none');
                });
            }else{
                $(".single-news").css('display', 'block')
            }
        });
    }
    function searchEvents() {
        $(".input-search-sidebar-events").on("input", function () {
            var value = $(this).val();
            if (value.length > 3) {
                $(".single-events").each(function (i, html) {
                    var _this = $(this);
                    var title = $(html).find(".title").text();
                    var description = $(html).find(".description").text();

                    console.log(title, description);

                    (title.indexOf(value) >= 0 || description.indexOf(value) >= 0) ? _this.css('display', 'block') : _this.css('display', 'none');
                });
            }else{
                $(".single-events").css('display', 'block')
            }
        });
    }

});

