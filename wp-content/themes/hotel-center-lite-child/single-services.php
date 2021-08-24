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
<?php include dirname(__FILE__) . '/assets/css/page-service.css';
?>
</style>
<?php

$page_slug = get_post_type();
// var_dump($page_slug);exit;
$page_id = get_page_by_path($page_slug);

$pageTitle = 'Services';

$pageSubTitle = 'サービス';

$imageUrlBreadcrumb = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), $pageTitle );
if($imageUrlBreadcrumb){
    $imageUrlBreadcrumb = $imageUrlBreadcrumb[0];
}else{
    $imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-not-found/img-not-found-breadcrumb.png';
}

// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
<div id="sService">
    <div class="container css">
        <div class="spost">
            <div class="sp-header">
                <div class="sp-header-wrap">
                    <h3 class="sp-cat-title text-center"><?php the_title(); ?></h3>
                    <div class="sp-share">
                        <a href="#">
                            <i class="fas fa-share-alt"></i>
                            <span><?php echo $strButtonShare; ?></span>
                        </a>
                    </div>
                </div>
                <p class="sp-excerpt"><?php echo get_the_content(); ?></p>
            </div>
            <div class="sp-body">
                <h3 class="sp-title"><?php echo get_field('short_notes_field',get_the_ID()); ?></h3>
                <div class="sp-img">
                    <?php
                    $sliderCat = get_field('slide_thumbnail', get_the_ID());
                    // echo "<pre>";var_dump($lengthArray);exit;
                    if($sliderCat && $sliderCat['img_1'] != false) :
                    $lengthArray = count($sliderCat);
                    ?>
                    <div class="post-img-slide-wrap">
                        <div id="carouselImgSlideModal" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'custom-feature' ); ?>
                                <li data-target="#carouselImgSlideModal" data-slide-to="0" class="active"
                                    style="background: url('<?php echo $image[0]; ?>')">
                                </li>

                                <?php endif; ?>

                                <?php for($i = 0; $i < $lengthArray; $i++) : ?>

                                <?php 
                                $nameImg = 'img_'.($i + 1);
                                if($sliderCat[$nameImg] != false) : ?>

                                <li data-target="#carouselImgSlideModal"
                                    data-slide-to="<?php if(!has_post_thumbnail( get_the_ID() )) echo $i; else echo $i+1; ?>"
                                    class="<?php if($i==0 && !has_post_thumbnail( get_the_ID() ))echo'active'; ?>"
                                    style="background: url('<?php echo $sliderCat[$nameImg]['url'] ?>')">
                                </li>

                                <?php endif; ?>

                                <?php endfor; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'custom-feature' ); ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo $image[0]; ?>"
                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                </div>
                                <?php endif; $i = 0;?>
                                <?php foreach($sliderCat as $ks=>$vs) : ?>
                                <?php if($sliderCat[$ks] != false) : ?>
                                <div
                                    class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( get_the_ID() )) echo 'active'; ?>">
                                    <img src="<?php echo $vs['url']; ?>" alt="<?php echo $vs['title']; ?>">
                                </div>
                                <?php $i++; endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control carousel-control-prev" href="#carouselImgSlideModal"
                                role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control carousel-control-next" href="#carouselImgSlideModal"
                                role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="quote-orverlay"></div>
                    </div>

                    <?php else :?>

                    <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'custom-feature' ); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                    <?php endif;?>

                    <?php endif; ?>
                </div>
                <!-- end slide imgage -->

                <?php $basicInformation = get_field('basic_information_field', get_the_ID()); ?>
                <?php if($basicInformation != NULL) :?>
                <div class="sprow-utilities sm-basic row">
                    <div class="sprow-title col-md-3">
                        <h4><?php _e('基本情報', 'hotel-center-lite-child'); ?></h4>
                    </div>
                    <div class="sprow-basic-utilities col-md-9">
                        <div class="row">
                            <?php if($basicInformation['location_field'] != ''){ ?>
                            <div class="sprow-item col-md-6">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/services/is.png"
                                    alt="">
                                <div class="sprow-text"><?php echo $strLocation; ?></div>
                                <div class="sprow-value"><?php echo $basicInformation['location_field']; ?></div>
                            </div>
                            <?php } ?>
                            <div class="sprow-item col-md-6">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facilities/u-f3.png"
                                    alt="">
                                <div class="sprow-text"><?php echo $strOpeningHours; ?></div>
                                <?php if($basicInformation['opening_hours_field'] != ''){ ?>
                                <div class="sprow-value"><?php echo $basicInformation['opening_hours_field']; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- other service -->
    <div class="container">
        <section class="single-service">
            <div class="single-service-wrap">
                <h2 class="sw-title cl-title text-center">
                    <span
                        class="cl-main-title change-cl"><?php _e('Other Services', 'hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title"><?php _e('他のサービス', 'hotel-center-lite-child') ?></span>
                </h2>
                <div class="service-carousel">
                    <div class="container-fluid">
                        <div id="multi-carousel-service" class="service-carousel">
                            <div class="owl-carousel owl-theme">
                                <?php 
                                $args = array(
                                    'post_type'     =>      'services',
                                    'orderby'       =>      'date',
                                    'order'         =>      'DESC',
                                    'post_status'   =>      'publish',
                                    'posts_per_page'=>      -1,
                                    'post__not_in'  =>      array(get_the_ID())
                                );
                                $query = new WP_Query($args);
                                $myPosts = $query->get_posts();
                                // echo "<pre>";print_r($myPosts);exit;
                                foreach($myPosts as $k=>$v) :
                                ?>
                                <div class="item">
                                    <div class="panel panel-default">
                                        <div class="panel-thumbnail">
                                            <a href="<?php echo home_url($v->post_type . '/' . $v->post_name .'.html'); ?>"
                                                title="<?php echo $v->post_title; ?>" class="thumb">

                                                <div class="sw-img">

                                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'custom-service-other' ); ?>
                                                    <img src="<?php if (has_post_thumbnail( $v->ID ) ){echo $image[0];} ?>"
                                                        alt="<?php if (has_post_thumbnail( $v->ID ) ){custom_the_post_thumbnail_caption();}else{ _e('Not Image', 'hotel-center-lite-child');} ?>">

                                                    <div class="sw-orverlay"></div>
                                                </div>

                                                <div class="sw-content post-content">
                                                    <div class="sw-cat text-center">
                                                        <?php echo $v->post_title; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php 

get_footer();