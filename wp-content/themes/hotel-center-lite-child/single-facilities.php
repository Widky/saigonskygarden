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
<?php 
$page_slug = get_post_type();

$page_id = get_page_by_path($page_slug);

$pageTitle = 'Facilities';

$pageSubTitle = '施設';

$imageUrlBreadcrumb = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), $pageTitle );
if($imageUrlBreadcrumb){
    $imageUrlBreadcrumb = $imageUrlBreadcrumb[0];
}else{
    $imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-not-found/img-not-found-breadcrumb.png';
}
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
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
    <div class="container-fluid container-facilities-about">
        <div class="wrap-facilities-about">
            <div class="mask-facilities-about">
                <div class="content-facilities-about"></div>
            </div>
            <h2 class="cl-title text-center">
                <span class="cl-main-title"><?php _e('OTHER FACILITIES','hotel-center-lite-child') ?></span>
                <span class="cl-sub-title"><?php _e('施設','hotel-center-lite-child') ?></span>
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
                            'post__not_in'  =>      array(get_the_ID())
                        );
                        $query = new WP_Query($args);
                        $myPosts = $query->get_posts();
                        $i = 0;
                        // echo "<pre>";print_r($myPosts);
                        foreach($myPosts as $k=>$v) :
                            $image = get_field('image_show_in_about_page',$v->ID);

                            // if ($image != NULL ): ?>
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
                        <?php //endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>