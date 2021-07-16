<?php 
/**
 * Template Name: ページサービス - Page Service
 */

get_header();

include dirname( __FILE__ ) . '/inc/lang/translate.php';

?>
<style>
<?php include dirname(__FILE__) . '/assets/css/page-service.css';
?>
</style>
<div id="pService">

    <div class="container">
        <div class="sr-title">
            <div class="sr-title-wrap container">
                <h2 class="cl-title text-center">
                    <span class="cl-main-title change-cl"><?php _e('Services','hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title"><?php _e('サービス','hotel-center-lite-child') ?></span>
                </h2>
                <div class="cl-tax-share">
                    <a href="#">
                        <i class="fas fa-share-alt"></i>
                        <span><?php echo $strButtonShare; ?></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row service-items">
            <?php      
            $args = array(
                'post_type'         =>  'services',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  -1,
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>";print_r($my_posts);exit;  
            $i = 1;
            if($my_posts) :       
            foreach($my_posts as $k=>$v) : ?>
            <div class="col-12 <?php if($i%2==0) echo 'nth' ?>">
                <div class="service-item row">
                    <div class="si-img col-lg-7 col-md-12">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php if (has_post_thumbnail( $v->ID ) ){echo $image[0];} ?>"
                            alt="<?php if (has_post_thumbnail( $v->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">
                    </div>
                    <div class="si-body col-lg-5 col-md-12">
                        <h3 class="si-title"><?php echo $v->post_title; ?></h3>
                        <div class="si-cat"><?php echo get_field('short_notes_field',$v->ID); ?></div>
                        <p class="si-excerpt"><?php echo $v->post_excerpt; ?></p>
                        <div class="btn-direct">
                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name . '.html'); ?>"><?php _e('もっと見る', 'hotel-center-lite-child'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php 

get_footer();