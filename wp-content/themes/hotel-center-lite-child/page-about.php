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
<div class="page-about-block-feature container">
    <div class="page-about-block-feature-wrap ">
        <div class="about-feature-lists row">
            <div class="about-feature-item col-md-4 col-12">
                <div class="about-feature-item-wrap">
                    <a href="<?php echo home_url('feature.html'); ?>"
                        class="thumb">
                        <div class="afi-img">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/feature.png"
                                alt="<?php echo $v->post_title; ?>">
                        </div>
                        <div class="afi-content">
                            <h3 class="afi-title"><?php _e('特徴','hotel-center-lite-child') ?></h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="about-feature-item col-md-4 col-12">
                <div class="about-feature-item-wrap">
                    <a href="<?php echo home_url('facilities.html'); ?>" 
                        class="thumb">
                        <div class="afi-img">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/facilities.png"
                                alt="<?php echo $v->post_title; ?>">
                        </div>
                        <div class="afi-content">
                            <h3 class="afi-title"><?php _e('施設','hotel-center-lite-child') ?></h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="about-feature-item col-md-4 col-12">
                <div class="about-feature-item-wrap">
                    <a href="<?php echo home_url('attractions.html'); ?>"
                        class="thumb">
                        <div class="afi-img">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/attractions.png"
                                alt="<?php echo $v->post_title; ?>">
                        </div>
                        <div class="afi-content">
                            <h3 class="afi-title"><?php _e('魅力 ','hotel-center-lite-child') ?></h3>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

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
                        if (has_post_thumbnail( $v->ID ) ): ?>
                        <div class="carousel-item <?php if($i == 0) echo 'active'; ?>">
                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html')?>">
                                <div class="fiw-img">
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>"
                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
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

<div class="popular-video">
    <div class="container">
        <h2 class="cl-title text-center">
            <span class="cl-main-title change-cl"><?php echo _e('POPULAR VIDEO','hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('施設','hotel-center-lite-child') ?></span>
        </h2>
        <div class="row rvideo">
            <div class="col-lg-6 col-md-12">
                <div class="card about-video">
                    <?php if($showAboutPage['video_about']['url']) : ?>
                    <div class="card-img-top">
                        <iframe width="560" height="315"
                            src="<?php echo $showAboutPage['video_about']['url']; ?>&showinfo=0&rel=0" frameborder="0"
                            allowfullscreen="allowfullscreen"></iframe>
                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $showAboutPage['video_about']['video_name']; ?></h5>
                        <p class="card-text"><?php echo $showAboutPage['video_about']['video_description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 change-mgt">
                <div class="card about-video">
                    <?php if($showAboutPage['video_about_2']['url']) : ?>
                    <div class="card-img-top">
                        <iframe width="560" height="315"
                            src="<?php echo $showAboutPage['video_about_2']['url']; ?>&showinfo=0&rel=0" frameborder="0"
                            allowfullscreen="allowfullscreen"></iframe>
                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $showAboutPage['video_about_2']['video_name']; ?></h5>
                        <p class="card-text"><?php echo $showAboutPage['video_about_2']['video_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();