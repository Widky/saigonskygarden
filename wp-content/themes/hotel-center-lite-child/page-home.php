<?php
/**
 * Template Name: ホーム - Home 
 */

?>
<?php get_header(); ?>
<?php include dirname( __FILE__ ) . '/inc/lang/translate.php'; ?>

<section class="slider-home">
    <?php echo do_shortcode('[smartslider3 slider="2"]'); ?>
    <div class="scroll-bar">
        <div class="scroll-bar-wrap">
            <a href="#block_about">
                <div class="scb-text"><?php _e('SCROLL'); ?></div>
                <div class="scb-line"></div>
            </a>
        </div>
    </div>
</section>

<?php require_once(get_stylesheet_directory() . '/template-parts/block/block-home-about-us.php'); ?>

<section class="group-block">
    <?php require_once(get_stylesheet_directory() . '/template-parts/block/block-apartment.php'); ?>
    <?php require_once(get_stylesheet_directory() . '/template-parts/block/block-features.php'); ?>
</section>

<?php require_once(get_stylesheet_directory() . '/template-parts/block/block-video.php'); ?>

<?php require_once(get_stylesheet_directory() . '/template-parts/block/block-facilities.php'); ?>

<?php require_once(get_stylesheet_directory() . '/template-parts/block/block-services.php'); ?>

<?php require_once(get_stylesheet_directory() . '/template-parts/block/block-event.php'); ?>

<?php require_once(get_stylesheet_directory() . '/template-parts/block/block-quote-customer.php'); ?>

<?php get_footer(); ?>