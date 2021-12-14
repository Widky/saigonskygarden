<div class="row">
     <div class="col-12 p-0">
         <section class="events">
            <div class="events-wrap">
                <h2 class="ap-title cl-title text-center">
                    <span class="cl-main-title change-cl"><?php echo _e('EVENT', 'hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title change-cl"><?php echo _e('イベント', 'hotel-center-lite-child') ?></span>
                </h2>
                <div class="events-carousel">
                    <div class="container-fluid">
                        <div id="multi-carousel">
                            <div class="owl-carousel owl-theme">
                                <?php 
                                $args = array(
                                    'post_type'     =>      'event',
                                    'orderby'       =>      'date',
                                    'order'         =>      'DESC',
                                    'post_status'   =>      'publish',
                                    'posts_per_page'=>      12
                                );
                                $query = new WP_Query($args);
                                $myPosts = $query->get_posts();
                                // echo "<pre>";print_r($myPosts);exit;
                                foreach($myPosts as $k=>$v) :
                                    ?>
                                <div class="item">
                                    <div class="panel panel-default">
                                        <div class="panel-thumbnail">
                                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>"
                                                class="thumb">
                                                <div class="h_event_img">
                                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                                    <img src="<?php if (has_post_thumbnail( $v->ID ) ){echo $image[0];} ?>"
                                                    alt="<?php if (has_post_thumbnail( $v->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">
                                                </div>    
                                                
                                                <div class="evc-content p-3">
                                                    <div class="hevent_date" style="text-align: center">(<?php echo get_field('day_of_event_bk', $v->ID); ?>)</div>
                                                    <h3 class="evc-title mb-2 mt-2"><?php echo $v->post_title; ?></h3>
                                                    <!-- <?php //if($v->post_excerpt != '') echo '<pre class="evc-excerpt">'.$v->post_excerpt.'</pre>'; ?> -->
                                                    <div class="evc-excerpt">
                                                        <?php
                                                                $locale = get_locale();
                                                                $event_len = mb_strlen($v->post_excerpt,'UTF-8');
                                                                if($locale == 'ja'){
                                                                    echo mb_substr($v->post_excerpt, 0, 25,'UTF-8');
                                                                        if($event_len > 25 ){
                                                                            echo '...';
                                                                        }
                                                                }else{
                                                                    echo mb_substr($v->post_excerpt, 0, 50,'UTF-8');
                                                                        if($event_len > 50 ){
                                                                            echo '...';
                                                                        }    
                                                                } 
                                                            ?>
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
