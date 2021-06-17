<?php 
/**
 * Template Name: ページ設備 - Page Facilities
 */

get_header();

include dirname( __FILE__ ) . '/inc/lang/translate.php';

$showHomePage = get_field('show_home_page');
$showAboutPage = get_field('show_about_page');
?>
<style>
<?php include dirname(__FILE__) . '/assets/css/page-facilities.css';
?>
</style>
<div id="pFacilities">
    <div class="sr-title">
        <div class="sr-title-wrap container">
            <h2 class="cl-title text-center">
                <span class="cl-main-title change-cl"><?php echo _e('Facilities','hotel-center-lite-child') ?></span>
                <span class="cl-sub-title"><?php echo _e('特色','hotel-center-lite-child') ?></span>
            </h2>
            <div class="cl-tax-share">
                <a href="#">
                    <i class="fas fa-share-alt"></i>
                    <span><?php echo $strButtonShare; ?></span>
                </a>
            </div>
        </div>
    </div>
    <div class="pfacilities-wrap container">
        <div class="pfacilities-items row row-eq-height">

            <?php      
            $args = array(
                'post_type'         =>  'facilities',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  12,
                // 'tax_query'         =>  array(
                //     array(
                //         'taxonomy'      =>  'facilities-category',
                //         'field'         =>  'slug',
                //         'terms'         =>  $strCatFacilities,
                //         'operator'      =>  'NOT IN'
                //     ),
                // )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>";print_r($my_posts);exit;         
            foreach($my_posts as $k=>$v) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="pfacilities-item">
                    <div class="pfacilities-img">
                        <?php
                            $image = get_field('image_for_post_page', $v->ID);
                            if( !empty( $image ) ): ?>

                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                            title="<?php echo $v->post_title; ?>" />

                        <?php else : ?>

                        <?php if (has_post_thumbnail( $v->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                        <?php endif; ?>

                        <?php endif; ?>

                        <?php $note = get_field('note', $v->ID); ?>
                        <?php if($note != '') { ?>
                        <div class="pfnote"><?php echo $note; ?></div>
                        <?php } ?>
                    </div>
                    <div class="pfacilities-body">
                        <div class="pfcontent">
                            <h3 class="pftitle"><?php echo $v->post_title; ?></h3>
                            <p class="pfexcerpt"><?php echo $v->post_excerpt; ?></p >
                        </div>
                        <div class="pffooter btn-direct">
                            <a href="/<?php echo $v->post_type . '/' .$v->post_name ?>.html"
                                rel="noopener noreferrer"><?php _e('もっと見る','hotel-center-lite-child') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php

get_footer();