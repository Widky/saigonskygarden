jQuery(document).ready(function() {

    //other event
    jQuery('#multi-carousel-event .owl-carousel').owlCarousel({
        loop: false,
        nav: true,
        navText: ['<span class="prev-icon"></span>', '<span class="next-icon"></span>'],
        dots: false,
        margin: 28,

        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            960: {
                items: 3,

            },
            1200: {
                items: 3,
            }

        }
    });

    //event facilities
    jQuery('.center').slick({
        infinite: true,
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: '20%',
        appendArrows: jQuery('.arrows_custom'),
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: true,
                    slidesToShow: 1,
                    centerPadding: '20%',
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: false,
                    slidesToShow: 1,
                    centerPadding: '20px',
                }
            }
        ]
    });

});