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
                items: 3,
                margin: 28,
            },
            1440: {
                items: 3,
                margin: 72.7
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
            1300: {
                items: 3,
                margin: 31
            },
            1920: {
                items: 3,
                margin: 31
            }

        }
    })

    //other attractions
    jQuery('#multi-carousel-attractions .owl-carousel').owlCarousel({
        loop: false,
        nav: true,
        navText: ['<span class="prev-icon"></span>', '<span class="next-icon"></span>'],
        dots: false,
        margin: 35,

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
            1300: {
                items: 3,
                margin: 31
            },
            1920: {
                items: 3,
                margin: 31
            }
        }
    });

    //other service
    jQuery('#multi-carousel-service .owl-carousel').owlCarousel({
        loop: false,
        nav: true,
        navText: ['<span class="prev-icon"></span>', '<span class="next-icon"></span>'],
        dots: false,
        margin: 35,

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
            1300: {
                items: 3,
                margin: 31
            },
            1920: {
                items: 3,
                margin: 31
            }
        }
    });

    // about
    jQuery('.carousel-facilities-about .owl-carousel').owlCarousel({
        stagePadding: 200,
        margin: 40,
        nav: true,
        navText: ['<span class="prev-icon"></span>', '<span class="next-icon"></span>'],
        dots: false,
        loop: true,
        responsive: {
          0: {
            items: 1,
            stagePadding: 60,
            margin: 10,
          },
          600: {
            items:1
          },
          1000: {
            items: 1
          }
        }
    })
});