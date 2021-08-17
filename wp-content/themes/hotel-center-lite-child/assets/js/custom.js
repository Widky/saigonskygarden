jQuery(document).ready(function() {
    var window_h = jQuery(window).height();
    jQuery("#navbar-main").height();
    jQuery(".navbar-main-collapse-btn").click(function() {
        jQuery("#navbar-main-mobi").show();
    })
    jQuery("#navbar-main-mobi li span").click(function() {
        jQuery(this).parents("li").find(".sub-menu").toggle();
        jQuery(this).parents("li").toggleClass("open-sub");

    })
    jQuery("#dismiss").click(function() {
        jQuery("#navbar-main-mobi").hide();
    })
})

jQuery('.btn-play').click(function(e) {
    e.preventDefault();
    jQuery(this).hide();
    jQuery('.home-video .card-title').hide();
    jQuery('.ytp-cued-thumbnail-overlay').hide();
    jQuery('#background-video').find('iframe').show();
    jQuery('#background-video').find('iframe')[0].src += "&autoplay=1";
});
jQuery('.btn-play2').click(function(e) {
    e.preventDefault();
    jQuery(this).hide();
    jQuery('.home-video .card-title').hide();
    jQuery('#background-video2').find('iframe').show();
    jQuery('#background-video2').find('iframe')[0].src += "&autoplay=1";
});