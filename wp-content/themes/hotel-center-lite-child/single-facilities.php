<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Hotel Center Lite
 */

get_header(); 

include dirname( __FILE__ ) . '/inc/lang/translate.php';
?>
<style>
<?php include dirname(__FILE__) . '/assets/css/single-facilities.css';
?>
</style>
<div class="container">
    <div id="pagelayout_area">
        <section class="singlesite-maincontentarea">
            <?php while ( have_posts() ) : the_post(); ?>
            <?php require_once(get_stylesheet_directory() . '/template-parts/contents/content-facilities.php' ); ?>
            <?php endwhile; // end of the loop. ?>
        </section>
        <div class="clear"></div>
    </div><!-- pagelayout_area -->
</div><!-- container -->
<div class="block-carousel-facilities-about">
    <div class="block-carousel-facilities-about-wrap container">
        <h2 class="cl-title text-center">
            <span class="cl-main-title"><?php echo _e('FACILITIES','hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('施設','hotel-center-lite-child') ?></span>
        </h2>
        <div class="carousel-facilities-about">
            <div class="carousel-facilities-about-wrap">
                <div id="carouselFacilitiesAbout" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                    $args = array(
                        'post_type'     =>      'facilities',
                        'orderby'       =>      'date',
                        'order'         =>      'DESC',
                        'post_status'   =>      'publish',
                    );
                    $query = new WP_Query($args);
                    $myPosts = $query->get_posts();
                    $i = 0;
                    // echo "<pre>";print_r($myPosts);
                    foreach($myPosts as $k=>$v) :
                        $image = get_field('image_show_on_slide_page_about', $v->ID);
                        if( !empty( $image ) ): ?>
                        <div class="carousel-item <?php if($i == 0) echo 'active'; ?>">
                            <a href="<?php echo $v->guid; ?>">
                                <div class="fiw-img">
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>"
                                        title="<?php echo $v->post_title; ?>" />
                                </div>
                            </a>
                        </div>
                        <?php $i++; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselFacilitiesAbout" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselFacilitiesAbout" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="quote-orverlay"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>