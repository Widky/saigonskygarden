<div class="row">
    <div class="col-12 p-0">
        <section class="service">
            <div class="service-wrap container">
                <h2 class="ap-title cl-title text-center">
                    <span class="cl-main-title change-cl"><?php echo _e('SERVICES', 'hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title change-cl"><?php echo _e('サービス', 'hotel-center-lite-child') ?></span>
                </h2>
                <?php
                $args = array(
                    'post_type'         =>  'services',
                    'orderby'           =>  'date',
                    'order'             =>  'DESC',
                    'post_status'       =>  'publish',
                );
                $query = new WP_Query($args);
                if($query->have_posts()) :
                    $my_posts = $query->get_posts();
                    // echo "<pre>"; print_r($my_posts);exit;
                    ?>
                <div class="service-tabs">
                    <ul class="nav nav-tabs" id="serviceTab" role="tablist">
                        <?php
                            foreach($my_posts as $k=>$v) : 
                                if($k == 0){
                                    $addClass = 'active';
                                }else{
                                    $addClass = '';
                                }
                                if($k <= 4){
                                    ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  $addClass; ?>" id="post-<?php echo $v->ID; ?>-tab"
                                data-toggle="tab" href="#post-<?php echo $v->ID; ?>" role="tab"
                                aria-controls="post-<?php echo $v->ID; ?>"
                                aria-selected="true"><?php echo $v->post_title; ?></a>
                        </li>
                        <?php 
                                }
                            ?>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content" id="serviceTabContent">
                        <?php 
                        foreach($my_posts as $k=>$v) :
                            if($k == 0){
                                $addClass = 'show active';
                            }else{
                                $addClass = '';
                            }
                            echo '<div class="tab-pane fade '.$addClass.'" id="post-'.$v->ID.'" role="tabpanel" aria-labelledby="post-'.$v->ID.'-tab">';
                            ?>
                        <div class="service-posts">
                            <div class="service-post">
                                <div class="service-post-wrap">
                                    <div class="spw-img">
                                        <?php if (has_post_thumbnail( $v->ID ) ): ?>
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                        <img src="<?php echo $image[0]; ?>"
                                            alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="spw-content">
                                        <h3 class="spw-title"><?php echo get_field('short_notes',$v->ID); ?></h3>
                                        <?php if($v->post_excerpt != '') echo '<pre class="spw-excerpt sdes">'.$v->post_excerpt.'</pre><p class="spw-excerpt d-none smo">'.$v->post_excerpt.'</p>'; ?>
                                        <div class="spw-btn-direct btn-direct">
                                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name . '.html'); ?>"><?php _e('もっと見る', 'hotel-center-lite-child'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php wp_reset_postdata(); // Reset Post Data ?>
                        </div>
                        <?php
                            echo '</div>';
                        endforeach;
                    ?>
                    </div>
                </div>

                <?php endif; ?>
                <!-- end if have post -->
            </div>
        </section>
    </div>
</div>