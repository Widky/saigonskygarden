jQuery(document).ready(function() {
    jQuery('.owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        navText: ['<span class="prev-icon"></span>', '<span class="next-icon"></span>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2,
                margin: 28,
            },
            1000: {
                items: 3,
                margin: 28,
            },
            1920: {
                items: 3,
                margin: 72.7
            }

        }
    })
});