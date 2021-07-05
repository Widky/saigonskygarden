<?php 
/**
 * Template Name: ページの特徴 - Page Features
 */

get_header();

include dirname( __FILE__ ) . '/inc/lang/translate.php';
?>
<style>
<?php include dirname(__FILE__) . '/assets/css/page-features.css';
?>
</style>
<div id="pFeatures">
    <div class="sr-title">
        <div class="sr-title-wrap container">
            <h2 class="cl-title text-center">
                <span class="cl-main-title change-cl"><?php echo _e('Feature','hotel-center-lite-child') ?></span>
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
    <div class="pfeatures-wrap container">
        <div class="pfeatures-items">

            <?php      
            $args = array(
                'post_type'         =>  'post',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  -1,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'category',
                        'field'         =>  'slug',
                        'terms'         =>  $strCatFeatures,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>";print_r($my_posts);exit; 
            if($my_posts) :   

            foreach($my_posts as $k=>$v) : ?>
            <div class="pfeatures-item">
                <div class="pfeatures-img">

                    <?php if (has_post_thumbnail( $v->ID ) ): ?>

                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">

                    <?php else : ?>

                    <?php $image = get_field('show_home', $v->ID); ?>

                    <?php $image = $image['image_for_post_page']; ?>

                    <?php if( !empty( $image ) ){ ?>

                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        title="<?php echo $v->post_title; ?>" />

                    <?php }else{ ?>

                    <img src="" alt="<?php _e('No Image.','hotel-center-lite-child'); ?>">

                    <?php } ?>

                    <?php endif; ?>
                </div>
                <div class="pfeatures-body">
                    <div class="pfpoint">
                        <span class="ptext-point"><?php _e('Point', 'hotel-center-lite-child') ?></span>
                        <span class="ptext-num"><span><?php echo $k + 1; ?></span></span>
                    </div>
                    <div class="pfcontent">
                        <h3 class="pftitle"><?php echo $v->post_title; ?></h3>
                        <pre class="pfexcerpt"><?php echo $v->post_excerpt; ?></pre>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php else : ?>

            <?php require_once(get_stylesheet_directory() . '/template-parts/contents/content-none.php'); ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<section class="tax-other">
    <div class="tax-other-wrap">
        <h2 class="cl-title text-center">
            <span class="cl-main-title change-cl"><?php echo _e('Services','hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('サービス','hotel-center-lite-child') ?></span>
        </h2>
        <div class="tax-other-items container">
            <div class="row">
                <?php 
                $args = array(
                    'post_type'     =>      'service',
                    'orderby'       =>      'date',
                    'order'         =>      'DESC',
                    'post_status'   =>      'publish',
                    'posts_per_page'=>      2
                );
                $query = new WP_Query($args);
                $myPosts = $query->get_posts();
                // echo "<pre>";print_r($myPosts);exit;
                foreach($myPosts as $k=>$v) : 
                ?>
                <div class="col-md-6 col-12">
                    <div class="item">
                        <div class="item-wrap">
                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name . '.html'); ?>" title="<?php echo $v->post_title; ?>" class="thumb">

                                <?php if (has_post_thumbnail( $v->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                <?php endif; ?>

                                <div class="item-body">
                                    <h3 class="item-title"><?php echo $v->post_title; ?></h3>
                                    <pre class="item-excerpt"><?php echo $v->post_excerpt; ?></pre>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php

get_footer();