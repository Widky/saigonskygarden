<?php 
/**
 * Template Name: ページのアトラクション - Page Attractions
 */

get_header();

include dirname( __FILE__ ) . '/inc/lang/translate.php';

?>
<style>
<?php include dirname(__FILE__) . '/assets/css/page-attractions.css';
?>
</style>
<div class="pAttractions">
    <div class="container">
        <div class="attractions-items row">
            <?php 
            $terms = get_terms(array(
                'taxonomy'  => 'attractions',
                'orderby'   =>  'date',
                'order'     => 'ASC'
            )); 
            // echo "<pre>"; var_dump($terms); exit;
            $i = 1;
            foreach($terms as $k=>$v) :
                if($v->slug != $theAttractionsAbout && $v->slug != $theAttractionsFesRes) :
                ?>
            <div class="col-12">
                <h2 class="cl-title text-center">
                    <span class="cl-main-title change-cl"><?php _e($v->name,'hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title"><?php _e($v->description,'hotel-center-lite-child') ?></span>
                </h2>
            </div>
            <?php 
            $args = array(
                'post_type'         =>  'attraction',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  3,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'attractions',
                        'field'         =>  'slug',
                        'terms'         =>  $v->slug,
                        'operator'      =>  'IN'
                    ),
                ),
                'meta_key' => '_is_ns_featured_post',
                'meta_value' => 'yes' 
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>"; var_dump($my_posts);exit;
            if($my_posts && $i < 4) :
                foreach($my_posts as $kp=>$vp) :
                    $termsPost = wp_get_object_terms( $vp->ID, 'attractions');
                    // var_dump($termsPost);
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="<?php echo home_url($termsPost[0]->taxonomy . '/' .$termsPost[0]->slug . '.html'); ?>">
                    <div class="attractions-item attractions-item<?php echo $i; ?>">
                        <div class="attractions-item-wrap">
                            <div class="aiw-img">

                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $vp->ID ), 'single-post-thumbnail' ); ?>
                                <img src="<?php if (has_post_thumbnail( $vp->ID ) ){echo $image[0];} ?>"
                                    alt="<?php if (has_post_thumbnail( $vp->ID ) ){custom_the_post_thumbnail_caption();}else{_e('Not Image', 'hotel-center-lite-child');} ?>">

                                <div class="aiw-des"><?php echo $vp->post_excerpt; ?></div>
                            </div>
                            <div class="aiw-body">
                                <h3 class="aiw-title" title="<?php echo $vp->post_title; ?>">
                                    <?php echo $vp->post_title; ?></h3>
                                <div class="aiw-line"></div>
                                <div class="aiw-content"><?php echo wpautop($vp->post_content); ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>

            <?php elseif($my_posts && $i == 4) : ?>

            <?php $j = 1; ?>
            <?php foreach($my_posts as $kp=>$vp) : $termsPost = wp_get_object_terms( $vp->ID, 'attractions');?>
            <div class="col-12 attractions-end <?php if($j%2==1) echo 'nth'; ?>">
                <a href="<?php echo home_url($termsPost[0]->taxonomy . '/' .$termsPost[0]->slug . '.html'); ?>">
                    <div class="attractions-item attractions-item<?php echo $i; ?>">
                        <div class="attractions-item-wrap row">
                            <div class="aiw-img col-lg-6 col-md-6 col-12">

                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $vp->ID ), 'single-post-thumbnail' ); ?>
                                <img src="<?php if (has_post_thumbnail( $vp->ID ) ){echo $image[0];} ?>"
                                    alt="<?php if (has_post_thumbnail( $vp->ID ) ){custom_the_post_thumbnail_caption();}else{_e('Not Image', 'hotel-center-lite-child');} ?>">

                                <div class="aiw-des"><?php echo $vp->post_excerpt; ?></div>
                            </div>
                            <div class="aiw-body col-lg-6 col-md-6 col-12">
                                <h3 class="aiw-title" title="<?php echo $vp->post_title; ?>">
                                    <?php echo $vp->post_title; ?></h3>
                                <div class="aiw-line"></div>
                                <div class="aiw-content"><?php echo wpautop($vp->post_content); ?></div>
                            </div>
                        </div>
                    </div>

                </a>
                <div class="aiw-line-point">
                    <div class="aiw-line-point-wrap">
                        <span class="aiw-point"><span></span></span>
                    </div>
                </div>
            </div>
            <?php $j += 1;?>
            <?php endforeach; ?>

            <?php endif; ?>
            <!-- end post -->
            <?php $i += 1; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div>
    <!-- end container -->
    <div class="festiva-restaurant">
        <div class="festiva-restaurant-wrap">
            <?php 
            $args = array(
                'post_type'         =>  'attraction',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  1,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'attractions',
                        'field'         =>  'slug',
                        'terms'         =>  $theAttractionsFesRes,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            if($my_posts) : ?>
            <div class="frw-item">

                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php if (has_post_thumbnail( $my_posts[0]->ID ) ){echo $image[0];} ?>"
                    alt="<?php if (has_post_thumbnail( $my_posts[0]->ID ) ){custom_the_post_thumbnail_caption();}else{ _e('Not Image', 'hotel-center-lite-child');} ?>">
                <div class="fri-body">
                    <h3 class="fri-title text-center"><?php echo $my_posts[0]->post_title; ?></h3>
                    <div class="fri-content aiw-content text-center"><?php echo wpautop($my_posts[0]->post_content); ?>
                    </div>
                </div>
                <div class="fri-overlay"></div>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php 
get_footer();