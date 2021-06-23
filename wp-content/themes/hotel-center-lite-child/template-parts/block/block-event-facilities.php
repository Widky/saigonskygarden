<?php
    $args_acc = array(
        'post_type'       => 'facilities',
        'post_status'     => 'publish',
        'meta_key' => '_is_ns_featured_post',
        'meta_value' => 'yes'
    );
    $facilities = new WP_Query( $args_acc );
?>
 <div class="row fcl-album">
        <div class="facility">
            <div class="fa_background"></div>
             <h2 class="ap-title cl-title text-center mb-4">
                <span class="cl-main-title change-cl"><?php echo __('FACILITIES', 'hotel-center-lite-child'); ?></span>
                <span class="cl-sub-title change-cl"><?php echo __('施設', 'hotel-center-lite-child'); ?></span>
            </h2> 
            <div class="fa_slider">
                <div class="center responsive  slider slick_wrap">
                    <?php if( $facilities->have_posts() ):
                            while($facilities->have_posts()) : $facilities->the_post();
                                $img_id = get_post_meta(get_the_ID(),'image_show_in_event_page',true);
                                $img_url = wp_get_attachment_url($img_id);
                                ?>
                                 <div class="fa_img">
                                    <a href="<?php echo get_permalink() ?>" target="_blank" >
                                        <img src="<?php echo  $img_url; ?>">
                                    </a>
                                </div>
                            <?php endwhile; endif; ?>
                        <?php wp_reset_postdata(); ?>
                        
                </div>
                <div class="arrows_custom">
                </div>
            </div>
        </div>       
    </div>
