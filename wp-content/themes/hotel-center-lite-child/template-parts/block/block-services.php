<div class="row">
    <div class="col-12 p-0">
        <section class="service">
            <div class="service-wrap container">
                <h2 class="ap-title cl-title text-center">
                    <span class="cl-main-title change-cl"><?php echo _e('SERVICES', 'hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title change-cl"><?php echo _e('サービス', 'hotel-center-lite-child') ?></span>
                </h2>
                <div class="service-tabs">
                    <ul class="nav nav-tabs" id="serviceTab" role="tablist">
                        <?php
                        $argsCat = array(
                            'taxonomy'          =>  'services',
                            'orderby'           =>  'term_order',
                            'order'             =>  'DESC',
                            'hide_empty'        =>  false
                        );
                        $cats = get_categories($argsCat);
                        // echo "<pre>"; print_r($cats);exit;
                        foreach($cats as $kCat=>$vCat) : 
                            if($kCat == 0){
                                $addClass = 'active';
                            }else{
                                $addClass = '';
                            }
                                
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  $addClass; ?>" id="term-<?php echo $vCat->term_id; ?>-tab"
                                data-toggle="tab" href="#term-<?php echo $vCat->term_id; ?>" role="tab"
                                aria-controls="term-<?php echo $vCat->term_id; ?>"
                                aria-selected="true"><?php echo $vCat->name; ?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <div class="tab-content" id="serviceTabContent">
                        <?php 
                        foreach($cats as $kCat=>$vCat) :
                            if($kCat == 0){
                                $addClass = 'show active';
                            }else{
                                $addClass = '';
                            }
                            echo '<div class="tab-pane fade '.$addClass.'" id="term-'.$vCat->term_id.'" role="tabpanel" aria-labelledby="term-'.$vCat->term_id.'-tab">';
                            ?>
                        <div class="service-posts">
                            <?php 
                                $args = array(
                                    'post_type'         =>  'service',
                                    'orderby'           =>  'date',
                                    'order'             =>  'DESC',
                                    'post_status'       =>  'publish',
                                    'posts_per_page'    =>  1,
                                    'tax_query'         =>  array(
                                        array(
                                            'taxonomy'      =>  'services',
                                            'field'         =>  'id',
                                            'terms'         =>  $vCat->term_id,
                                            'operator'      => 'IN'
                                        ),
                                    )
                                );
                                $query = new WP_Query($args);
                                if($query->have_posts()) :
                                $myPosts = $query->get_posts();
                                foreach($myPosts as $k=>$v) :
                                ?>
                            <div class="service-post">
                                <div class="service-post-wrap">
                                    <div class="spw-img">
                                        <?php if (has_post_thumbnail( $v->ID ) ): ?>
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                        <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="spw-content">
                                        <h3 class="spw-title"><?php echo $v->post_title; ?></h3>
                                        <?php if($v->post_excerpt != '') echo '<pre class="spw-excerpt sdes">'.$v->post_excerpt.'</pre><p class="spw-excerpt d-none smo">'.$v->post_excerpt.'</p>'; ?>
                                        <div class="spw-btn-direct btn-direct">
                                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name . '.html'); ?>"><?php _e('もっと見る', 'hotel-center-lite-child'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                endforeach; 
                                endif;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </div>
                        <?php
                            echo '</div>';
                            if($kCat > 4){
                                break;
                            }
                        endforeach;
                    ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

