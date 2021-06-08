jQuery(document).ready(function() {
    jQuery("#navbar-main").mCustomScrollbar({
        theme: "minimal"
    });

    jQuery('#dismiss, .header-overlay').on('click', function() {
        jQuery('#navbar-main').removeClass('active');
        jQuery('.header-overlay').removeClass('active');
    });

    jQuery('#navSidebarCollapse').on('click', function() {
        jQuery('#navbar-main').addClass('active');
        jQuery('.header-overlay').addClass('active');
        jQuery('.collapse.in').toggleClass('in');
        jQuery('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});