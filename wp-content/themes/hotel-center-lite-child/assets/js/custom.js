jQuery(document).ready(function() {
	var window_h = jQuery(window).height();
	jQuery("#navbar-main").height();
	jQuery(".navbar-main-collapse-btn").click(function(){
		jQuery("#navbar-main-mobi").show();
	})
	jQuery("#navbar-main-mobi li span").click(function(){
		jQuery(this).parents("li").find(".sub-menu").toggle();
		jQuery(this).parents("li").toggleClass("open-sub");

	})
	jQuery("#dismiss").click(function(){
		jQuery("#navbar-main-mobi").hide();
	})
})