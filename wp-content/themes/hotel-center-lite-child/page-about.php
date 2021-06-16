<?php 
/**
 * Template Name: ページについて - Page About
 */

get_header();

include dirname( __FILE__ ) . '/inc/lang/translate.php';

$showHomePage = get_field('show_home_page');
$showAboutPage = get_field('show_about_page');
?>
<style>
<?php include dirname(__FILE__) . '/assets/css/page-about.css';
?>
</style>
<div class="page-about-content container">
    <div class="page-about-title">
        <h3 class="post-title text-center"><?php echo $showHomePage[$pageAboutSub2Title] ?></h3>
    </div>
    <div class="page-about-content">
        <?php the_content(); ?>
    </div>
    <div class="cat-main-title">
        <div class="cat-line"></div>
        <h3 class="cat-title"><?php echo $strPageAboutFeature; ?></h3>
    </div>
    <div class="description-feature-about">
        <pre><?php echo $showAboutPage[$strPageAboutDesFeature] ?></pre>
    </div>
</div>
<div class="page-about-block-feature">
    <div class="page-about-block-feature-wrap container">
        <div class="about-feature-lists row">
            <div class="about-feature-item col-md-4 col-12">
                <div class="about-feature-item-wrap">
                    <a href="#">
                        <div class="afi-img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/pages/page-about/Restaurants-Services.png"
                                alt="">
                        </div>
                        <div class="afi-content">
                            <h3 class="afi-title">Restaurants Services</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="about-feature-item col-md-4 col-12">
                <div class="about-feature-item-wrap">
                    <a href="#">
                        <div class="afi-img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/pages/page-about/Spa-Sport.png"
                                alt="">
                        </div>
                        <div class="afi-content">
                            <h3 class="afi-title">Spa & Sport</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="about-feature-item col-md-4 col-12">
                <div class="about-feature-item-wrap">
                    <a href="#">
                        <div class="afi-img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/pages/page-about/Event-Party.png"
                                alt="">
                        </div>
                        <div class="afi-content">
                            <h3 class="afi-title">Event & Party</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($showAboutPage['video_about']) : ?>
<div class="about-video">
    <?php echo $showAboutPage['video_about'] ?>
</div>
<?php endif; ?>
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
<?php

get_footer();