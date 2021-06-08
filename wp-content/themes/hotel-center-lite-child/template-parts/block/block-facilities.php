<section class="facilities">
    <div class="facilities-wrap">
        <h2 class="ap-title cl-title text-center">
            <span class="cl-main-title change-cl"><?php echo _e('FACILITIES', 'hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('施設', 'hotel-center-lite-child') ?></span>
        </h2>
        <div class="facilities-items">
            <?php 
            $args = array(
                'post_type'     =>      'facilities',
                'orderby'       =>      'date',
                'order'         =>      'DESC',
                'post_status'   =>      'publish',
                'posts_per_page'=>      7
            );
            $query = new WP_Query($args);
            $myPosts = $query->get_posts();
            // echo "<pre>";print_r($myPosts);
            foreach($myPosts as $k=>$v) :
                ?>
            <div class="facilities-item">
                <div class="facilities-item-wrap">
                    <a href="<?php echo $v->guid; ?>">
                        <div class="fiw-img">
                            <?php if (has_post_thumbnail( $v->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                            <?php endif; ?>
                            <?php 
                            $imgOrverlay = get_field('background_overlay_for_images', $v->ID);
                            // echo "<pre>";var_dump($imgOrverlay);
                            if($imgOrverlay) echo "<div class='fiw-img-orverlay' style='background:url(".esc_url($imgOrverlay['url']).")'></div>"; ?>
                            </div>
                            <div class="fiw-content">
                                <?php
                            $iconPost = get_field('icon_title',$v->ID);
                            if($iconPost){
                                echo '<img src="'.esc_url($iconPost['url']).'" alt="'.esc_attr($iconPost['alt']).'"/>';
                            }
                            ?>
                            <h3 class="fiw-title"><?php echo $v->post_title; ?></h3>
                            <?php if($v->post_excerpt != '') echo '<pre class="fiw-excerpt">'.$v->post_excerpt.'</pre>'; ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php
            endforeach;
        ?>
        </div>
        <div class="bg-facilities bg-facilities-top"></div>
        <div class="bg-facilities bg-facilities-bottom"></div>
    </div>
</section>