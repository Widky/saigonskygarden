jQuery(document).ready(function() {
    jQuery('#multi-carousel .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        navText: ['<span class="prev-icon"></span>', '<span class="next-icon"></span>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1,
            },
            1024: {
                items: 2,
                margin: 28,
            },
            1920: {
                items: 3,
                margin: 72.7
            }

        }
    })

    // apartment
    jQuery('#multi-carousel-apartment .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        navText: ['<span class="prev-icon"></span>', '<span class="next-icon"></span>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2,
                margin: 28,
            },
            1024: {
                items: 2,
                margin: 31,
            },
            1440: {
                items: 2,
                margin: 31
            },
            1920: {
                items: 3,
                margin: 31
            }

        }
    })
});