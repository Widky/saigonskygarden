<?php $the_cat = 'post-home'; ?>
<div class="row position-relative apartment_frame">
    <div class="apratment_bg"></div>
    <div class="col-12 apartment_block p-0">
        <h2 class="cl-title text-center">
            <span class="cl-main-title"><?php _e('Feature','hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php _e('特色','hotel-center-lite-child') ?></span>
        </h2>
        <?php 
            $args = array(
                'post_type'         =>  'feature',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'meta_key' => '_is_ns_featured_post',
                'meta_value' => 'yes'
                // 'tax_query'         =>  array(
                //     array(
                //         'taxonomy'      =>  'category',
                //         'field'         =>  'slug',
                //         'terms'         =>  $the_cat,
                //         'operator'      =>  'IN'
                //     ),
                // )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>";print_r($my_posts);exit;
            ?>
        <div class="fw container">
            <div class="fw-items row">
                <?php
                $i = 1;
                    foreach($my_posts as $k=>$v) : 
                    ?>
                <div class="fw-items-wrap col-md-4 col-sm-12 col-12">
                    <a href="<?php echo home_url( $v->post_name .'.html' ); ?>">
                        <div class="fw-img <?php if($i == 3) echo 'fw-set-orverlay'; ?>">

                            <?php 
                                $showHome = get_field('show_home', $v->ID);
                                // echo "<pre>";var_dump($showHome);
                                if($showHome && $showHome != NULL){ ?>

                            <img src="<?php echo $showHome['image_for_post_page']['url']; ?>"
                                alt="<?php custom_the_post_thumbnail_caption(); ?>">

                            <?php 
                                $overlayImage = $showHome['overlay_image'];
                                if($i == 3 && $overlayImage ) {$overlayImage = $overlayImage['url']; echo "<div class='fw-img-orverlay' style='background: url(".$overlayImage.")'></div>";}
                                ?>
                            <?php } ?>
                        </div>
                        <div class="fw-content post-content">
                            <div class="fw-content-wrap">
                                <h3 class="post-title">
                                    <?php echo "<span class='set-pos'><span class='fw-title-number'><span>".$i."</span></span></span>"; echo '<span class="fw-title-content">'.$v->post_title.'<span>' ?>
                                </h3>
                                <pre class="post-excerpt"><?php echo $v->post_excerpt; ?></pre>
                            </div>
                        </div>

                    </a>
                </div>
                <?php $i++; endforeach; ?>
            </div>
        </div>
        <div class="fw-btn-direct btn-direct">
            <a href="<?php echo home_url('feature.html'); ?>" rel="noopener noreferrer">もっと見る</a>
        </div>
    </div>
</div>
