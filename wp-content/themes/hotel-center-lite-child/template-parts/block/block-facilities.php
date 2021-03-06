<div class="row position-relative">
    <div class="bg-facilities bg-facilities-top"></div>
    <div class="col-12 p-0">
        <h2 class="cl-title text-center facilites-title">
            <span class="cl-main-title change-cl"><?php echo _e('FACILITIES','hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('施設','hotel-center-lite-child') ?></span>
        </h2>
    </div>
</div>
<div class="row position-relative facilities_block ">
    <div class="container p-md-0">
        <div class="facilities-items row">
            <?php 
            $args = array(
                'post_type'     =>      'facilities',
                'orderby'       =>      'date',
                'order'         =>      'DESC',
                'post_status'   =>      'publish',
                'posts_per_page'=>      7,
                'meta_key' => '_is_ns_featured_post',
                'meta_value' => 'yes'
            );
            $query = new WP_Query($args);
            $myPosts = $query->get_posts();
            // echo "<pre>";print_r($myPosts);
            $i = 0;
             
            // $_SESSION['myVar'] ;  
            $w = ( isset($_COOKIE["screen_width"]) && $_COOKIE['screen_width'] != "" )   ? $_COOKIE['screen_width'] : '';
            foreach($myPosts as $k=>$v) :
            ?>
            <?php if($i == 0) { ?>
            <div class="facilities-item col-xl-3 col-sm-6 col-12 large-w">
                <div class="facilities-item-wrap">
                    <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>">
                        <?php 
                            $showHome = get_field('show_home_field', $v->ID);
                            // echo "<pre>";var_dump($showHome);
                            if($showHome && $showHome != NULL){ ?>
                        <div class="fiw-img"
                            style="background: url(<?php echo $showHome['image']['url']; ?>) center center;background-size: cover;background-repeat: no-repeat;">
                            <?php 
                                $imgOrverlay = $showHome['background_overlay_for_images'];
                                if($imgOrverlay) echo "<div class='fiw-img-orverlay' style='background:url(".esc_url($imgOrverlay['url']).");background-size: 100% 100%;'></div>"; ?>
                        </div>
                        <!-- <div class="mask-img"></div> -->
                        <?php } ?>

                        <div class="fiw-content">
                            <?php
                                $iconPost = $showHome['icon_title'];
                                // echo "<pre>";var_dump($iconPost);
                                if($iconPost != NULL){
                                    echo '<img src="'.esc_url($iconPost['url']).'" alt="'.esc_attr($iconPost['alt']).'"/>';
                                }
                                ?>
                            <h3 class="fiw-title"><?php echo $v->post_title; ?></h3>
                            <?php $short_notes = get_field('show_home_field', $v->ID); ?>
                            <?php if($short_notes && $short_notes['short_notes_field'] != '') echo '<pre class="fiw-excerpt">'.$short_notes['short_notes_field'].'</pre>'; ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php }else{ ?>
            <?php if($i == 1) { ?>
            <div class="col-12 col-xl-9 col-12 large-w">
                <div class="row">
                    <?php } ?>
                    <div class="facilities-item col-xl-4 col-sm-6 col-12">
                        <div class="facilities-item-wrap">
                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>">
                                <div class="fiw-img">
                                    <?php 
                                    $showHome = get_field('show_home_field', $v->ID);
                                    // echo "<pre>";var_dump($showHome);
                                    if($showHome && $showHome != NULL){ ?>
                                    <img src="<?php echo $showHome['image']['url']; ?>"
                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                    <?php 
                                    $imgOrverlay = $showHome['background_overlay_for_images'];
                                    if($imgOrverlay) echo "<div class='fiw-img-orverlay' style='background:url(".esc_url($imgOrverlay['url']).")'></div>"; ?>
                                    <?php } ?>
                                </div>
                                <div class="fiw-content">
                                    <?php
                                    $iconPost = $showHome['icon_title'];
                                    // echo "<pre>";var_dump($iconPost);
                                    if($iconPost != NULL){
                                        echo '<img src="'.esc_url($iconPost['url']).'" alt="'.esc_attr($iconPost['alt']).'"/>';
                                    }
                                    ?>
                                    <h3 class="fiw-title"><?php echo $v->post_title; ?></h3>
                                    <?php $short_notes = get_field('show_home_field', $v->ID); ?>
                                    <?php if($short_notes && $short_notes['short_notes_field'] != '') echo '<pre class="fiw-excerpt">'.$short_notes['short_notes_field'].'</pre>'; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php if(($i== count($myPosts) - 1)){ ?>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
            <?php
            $i = $i + 1;
            endforeach;

            foreach($myPosts as $k=>$v) :
                ?>
            <div class="facilities-item col-xl-3 col-sm-6 col-12 small-w">
                <div class="facilities-item-wrap">
                    <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>">
                        <?php 
                            $showHome = get_field('show_home_field', $v->ID);
                            // echo "<pre>";var_dump($showHome);
                            if($showHome && $showHome != NULL){ ?>
                        <div class="fiw-img"
                            style="background: url(<?php echo $showHome['image']['url']; ?>) center center;background-size: cover;background-repeat: no-repeat;">
                            <?php 
                                $imgOrverlay = $showHome['background_overlay_for_images'];
                                if($imgOrverlay) echo "<div class='fiw-img-orverlay' style='background:url(".esc_url($imgOrverlay['url']).");background-size: 100% 100%;'></div>"; ?>
                        </div>
                        <!-- <div class="mask-img"></div> -->
                        <?php } ?>

                        <div class="fiw-content">
                            <?php
                                $iconPost = $showHome['icon_title'];
                                // echo "<pre>";var_dump($iconPost);
                                if($iconPost != NULL){
                                    echo '<img src="'.esc_url($iconPost['url']).'" alt="'.esc_attr($iconPost['alt']).'"/>';
                                }
                                ?>
                            <h3 class="fiw-title"><?php echo $v->post_title; ?></h3>
                            <?php $short_notes = get_field('show_home_field', $v->ID); ?>
                            <?php if($short_notes && $short_notes['short_notes_field'] != '') echo '<pre class="fiw-excerpt">'.$short_notes['short_notes_field'].'</pre>'; ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="bg-facilities bg-facilities-bottom"></div>
    </div>
</div>