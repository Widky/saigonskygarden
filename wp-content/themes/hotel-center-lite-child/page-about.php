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
                    <a href="<?php echo home_url('feature.html'); ?>" class="thumb">
                        <div class="afi-img">
                            <img src="/wp-content/uploads/2021/07/feature.jpg" alt="feature.jpg">
                        </div>
                        <div class="afi-content">
                            <h3 class="afi-title"><?php _e('特徴','hotel-center-lite-child') ?></h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="about-feature-item col-md-4 col-12">
                <div class="about-feature-item-wrap">
                    <a href="<?php echo home_url('facilities.html'); ?>" class="thumb">
                        <div class="afi-img">
                            <img src="/wp-content/uploads/2021/07/facilities.jpg" alt="facilities.jpg">
                        </div>
                        <div class="afi-content">
                            <h3 class="afi-title "><?php _e('施設','hotel-center-lite-child') ?></h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="about-feature-item col-md-4 col-12">
                <div class="about-feature-item-wrap">
                    <a href="<?php echo home_url('attractions.html'); ?>" class="thumb">
                        <div class="afi-img">
                            <img src="/wp-content/uploads/2021/07/attractions.jpg" alt="attractions.jpg">
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
    <div class="container-fluid container-facilities-about">
        <div class="wrap-facilities-about">
            <div class="mask-facilities-about">
                <div class="content-facilities-about"></div>
            </div>
            <h2 class="cl-title text-center">
                <span class="cl-main-title"><?php echo _e('FACILITIES','hotel-center-lite-child') ?></span>
                <span class="cl-sub-title"><?php echo _e('施設','hotel-center-lite-child') ?></span>
            </h2>

            <div class="carousel-facilities-about">
                <div class="carousel-facilities-about-wrap">
                    <div class="owl-carousel owl-theme">
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
                            $image = get_field('image_show_in_about_page',$v->ID);

                            if ($image != NULL ): ?>
                        <div class="item <?php if($i == 0) echo 'active'; ?>">
                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html')?>">
                                <div class="fiw-img">
                                    <?php 
                                        if($image != NULL){
                                            echo '<img src="'.$image['url'].'" alt="'.$image['filename'].'">';
                                        }else{
                                            echo '<img src="" alt="'._('Not Image').'">';
                                        }
                                        ?>
                                </div>
                            </a>
                        </div>
                        <?php $i++; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popular-video page-popular-video">
    <div class="container">
        <h2 class="cl-title text-center">
            <span class="cl-main-title change-cl"><?php echo _e('POPULAR VIDEO','hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('紹介動画','hotel-center-lite-child') ?></span>
        </h2>
        <div class="content-popular-video">
            <div class="row rvideo">
                <div class="col-lg-6 col-md-12">
                    <div class="card about-video">
                        <?php if($showAboutPage['video_about']['url']) : ?>
                        <div class="card-img-top">
                            <?php if($showAboutPage['video_about']['representative_image'] != false){ ?>
                            <div id="background-video"
                                style="background: url(<?php echo $showAboutPage['video_about']['representative_image']['url']; ?>) top center no-repeat; background-size: cover;">
                                <iframe width="100%" height="315"
                                    src="<?php echo $showAboutPage['video_about']['url']; ?>&showinfo=0&rel=0"
                                    frameborder="0" allow="autoplay; encrypted-media"
                                    allowfullscreen="allowfullscreen"></iframe>
                                <a class="btn-play" href="#"></a>
                            </div>
                            <?php }else{ ?>
                            <iframe width="100%" height="315"
                                src="<?php echo $showAboutPage['video_about']['url']; ?>&showinfo=0&rel=0"
                                frameborder="0" allow="autoplay; encrypted-media"
                                allowfullscreen="allowfullscreen"></iframe>
                            <?php } ?>
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
                            <?php if($showAboutPage['video_about_2']['representative_image'] != false){ ?>
                            <div id="background-video2"
                                style="background: url(<?php echo $showAboutPage['video_about_2']['representative_image']['url']; ?>) top center no-repeat; background-size: cover;">
                                <iframe width="100%" height="315"
                                    src="<?php echo $showAboutPage['video_about_2']['url']; ?>&showinfo=0&rel=0"
                                    frameborder="0" allow="autoplay; encrypted-media"
                                    allowfullscreen="allowfullscreen"></iframe>
                                <h3 class="card-title"><?php echo $showAboutPage['video_about_2']['video_name']; ?>
                                </h3>
                                <a class="btn-play2" href="#">Play Button</a>
                            </div>
                            <?php }else{ ?>
                            <iframe width="100%" height="315"
                                src="<?php echo $showAboutPage['video_about_2']['url']; ?>&showinfo=0&rel=0"
                                frameborder="0" allow="autoplay; encrypted-media"
                                allowfullscreen="allowfullscreen"></iframe>
                            <?php } ?>
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
</div>
<?php

get_footer();